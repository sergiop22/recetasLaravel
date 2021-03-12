@extends('layouts.app')

@section('botones')

    <a href="{{ Route('recetas.create')}}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg style="width: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
        </svg>
    Crear receta
    </a>

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

        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>

        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p-3">

            @if (count($usuario->meGusta) > 0)
                <ul class="list-group">
                    @foreach($usuario->meGusta as $receta)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p>{{$receta->titulo}}</p>
                            <a class="btn btn-outline-danger text-uppercase font-weight-bold" href="{{ route('recetas.show', ['receta' => $receta->id ]) }}">Ver</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">No tienes recetas favorita</p>
            @endif
        </div>
        
    </div>

@endsection
