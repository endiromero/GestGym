<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdatePerfilAjaxFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Mostramos la pagina de perfil del usuario.
     *
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function perfil($username){
        $user = User::where('username',$username)->first();

        return view('user.perfil',[
            'user' => $user,
            'username' => $username
        ]);
    }

    /**
     * Funcion que muestra el formulario para actualizar los datos del usuario.
     *
     * @param $name
     * @return $this
     */
    public function edit($username){
        $username = User::where('username', $username)->first();

        return view('user.edit')->with('username', $username);
    }

    /**
     * Recogemos los datos enviados por post para procesalos y actualizarlos en la base de datos.
     *
     * @param CreateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateUserRequest $request, $id){
        $user = User::find($id);

        if( $image = $request->file('image') ){
            if( !strpos($user->image, "http") ) {
                $routeParts = explode('/', $user->image);
                Storage::disk('public')->delete('user/'.end($routeParts));
            }

            $url = $image->store('user','public');
        }else{
            $url = $user->image;
        }

        $user->fill([
            'image' => $url,
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'movil' => $request->input('movil'),
            'website' => $request->input('website'),
            'about' => $request->input('about')
        ]);

        $user->update();

        return redirect()->back();
    }

    /**
     * Pasamos los parametros para validar el formulario de actualizar el perfil del usuario
     *
     * @param UpdatePerfilAjaxFormRequest $request
     * @return array
     */
    protected function validacionUpdatePerfilAjax(UpdatePerfilAjaxFormRequest $request){
        return array();
    }

    /**
     * Recogemos el id del usuario para borrarlo con el metodo softDelete.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        User::where('id', $id)->delete();

        return redirect('/');
    }
}
