@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">Crear Maquina</h1>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-control" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('unidades') ? ' has-error' : '' }}">
                            <label for="unidades" class="col-md-4 control-label"><h2>Unidades</h2></label>

                            <input id="unidades" type="number" class="form-control" name="unidades" value="{{ old('unidades') }}">

                            @if ($errors->has('unidades'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('unidades') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('zona_trabajada') ? ' has-error' : '' }}">
                            <label for="zona_trabajada" class="col-md-4 control-label"><h2>Zona trabajada</h2></label>

                            <input id="zona_trabajada" type="text" class="form-control" name="zona_trabajada" value="{{ old('zona_trabajada') }}">

                            @if ($errors->has('zona_trabajada'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('zona_trabajada') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label"><h2>Descripcion</h2></label>

                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">

                            @if ($errors->has('descripcion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
                    <input type="file" id="image" name="image" class="show-for-sr">
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>
            </form>
        </div>
    </div>
</div>
@endsection

