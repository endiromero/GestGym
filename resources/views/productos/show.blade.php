@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

        @forelse($productos->chunk(3) as $chunk)
            <div class="row course-set courses__row event d-flex justify-content-around">
                @foreach($chunk as $producto)
                    <div class="card" style="width: 20rem; margin-top: 20px">
                        <img class="card-img-top" src="{{ $producto['imagen'] }}" height="200px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{$producto['nombre']}}-{{ $producto->precio }}€</strong></h5>

                            <strong>Sabor: </strong>{{$producto['sabor']}}<br>
                            <strong>Caracteristicas: </strong>{{$producto['caracteristicas']}}
                            <hr>

                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/productos/{{ $producto->id }}/edit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Producto">Editar</a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteProducto{{ $producto->id }}">Borrar</button>

                                    <div class="modal fade" id="deleteProducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-secondary d-flex justify-content-center">

                                                    <h4 class="modal-title  text-center">Estas seguro de eliminar: {{$producto->nombre}}?</h4>

                                                </div>
                                                <div class="modal-body d-flex justify-content-between">
                                                    <button type="button" class=" btn btn-success bg-success" data-dismiss="modal">
                                                        NO
                                                    </button>
                                                    <form action="{{route('producto.delete',array('id' => $producto->id))}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"  class="btn btn-danger">YES</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$producto['stock']}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay Productos añadidos todavia</h1>
        @endforelse

    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff;">{{ $gimnasio->nombre }}</h1>
            </div>
        </div>

        <button class="btn btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/productos/create" data-toggle="tooltip" data-placement="top" title="Añadir producto">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Producto
            </a>
        </button>
        <hr>
        <button class="btn-lg btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}" data-toggle="tooltip" data-placement="top" title="Volver a {{ $gimnasio->nombre }}">
                Volver a {{ $gimnasio->nombre }}
            </a>
        </button>
        <hr>
        <div style="background-color: #fff">

            <canvas id="myChart" width="600" height="350"></canvas>

        </div>
    </div>

</div>
@endsection

@push('scripts')

    <script>
        let ctx = document.getElementById("myChart").getContext('2d');

        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    "Suplemento",
                    "Barritas",
                    "Agua",
                    "Proteinas ",
                    "BCCA",
                    "Avena"
                ],
                datasets: [{
                    label: 'Precio',
                    data: [
                        30,
                        2,
                        1.5,
                        35,
                        27,
                        15
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                }]
            },

        });

    </script>
@endpush