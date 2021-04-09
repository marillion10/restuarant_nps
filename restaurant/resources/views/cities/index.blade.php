@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger i olika städer</h1>

	@foreach($cities as $city)

    <article class="card bg-dark text-light">
			<div class="card-body">
				<h5 class="card-title">{{ $city->name }}</h5>

<p>
				<a href="{{ route('cities.show', ['city' => $city->slug]) }}" class="btn btn-secondary">Se restauranger i {{ $city->name }} &raquo;</a>
			</div>
		</article>

	@endforeach

@endsection
