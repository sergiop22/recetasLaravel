<div class="col-md-4 mt-4">
	<div class="card shadow">
		<img class="card-img-top" src="/storage/{{ $receta->imagen }}" alt="receta-imagen">
		<div class="card-body">
			<h3 class="card-title">{{$receta->titulo}}</h3>

			<div class="meta-receta d-flex justify-content-between">
				@php
					$fecha = $receta->created_at
				@endphp

				<fecha-receta fecha="{{$fecha}}"></fecha-receta>

				<p>{{ count( $receta->likes) }} les gustó</p>
			</div>

			<p class="card-text">
				{{ Str::words( strip_tags($receta->preparacion), 20, '...') }} 
			</p>

			<a href="{{ route('recetas.show', ['receta' => $receta->id ]) }}" class="btn btn-danger d-block btn-receta">Ver receta</a>
		</div>
	</div>
</div>