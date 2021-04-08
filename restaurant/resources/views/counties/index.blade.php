@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger i olika län</h1>

	@foreach($counties as $county)
		<article class="card bg-dark text-light">
			<div class="card-body">
				<h5 class="card-title">{{ $county->name }}</h5>


				<a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary">Se restauranger i olika städer i ett län &raquo;</a>

			</div>
		</article>
	@endforeach

	@auth
		<div class="mt-4">
			<a href="/counties/create" class="btn btn-dark">Skapa ett län</a>
		</div>
	@endauth
@endsection
