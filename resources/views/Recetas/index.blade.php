@extends('layouts.app')

@section('botones')

    <a href="{{ Route('recetas.create')}}" class="btn btn-danger mr-2 text-white">Crear receta</a>

@endsection

@section('content')

<h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-danger text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoría</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($recetas as $receta)
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria->nombre}}</td>
                        <td> 
                            <!--<meta name="csrf-token" content="{{csrf_token()}}">-->
                            <eliminar-receta 
                                receta-id={{ $receta->id }}
                            ></eliminar-receta>

                            <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-dark d-block mr-1 mb-2">Editar</a>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success d-block mr-1 mb-2">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
