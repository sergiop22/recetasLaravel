@extends('layouts.app')

@section('styles')


@endsection


@section('content')
<div class="container nuevas-recetas">
	<h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas recetas</h2>

	<div class="row">
		@foreach($nuevas as $nueva)
			<div class="col-md-4">
				<div class="card">
					<img src="/storage/{{ $nueva->imagen }}" class="card-img-top" alt="imagen-receta">

					<div class="card-body">
						<h3>{{$nueva->titulo}}</h3>

						<p> {{ Str::words( strip_tags($nueva->preparacion), 50) }} </p>

						<a class="btn btn-danger d-block font-weight-bold text-uppercase" href="{{ route('recetas.show', ['receta' => $nueva->id]) }}">
							Ver receta
						</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>

</div>


@endsection