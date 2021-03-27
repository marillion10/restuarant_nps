@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Cities</h1>

	@foreach($cities as $city)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('cities.show', ['city' => $city->id]) }}">{{ $city->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Date: {{ $city->created_at }}</li>
						<li class="list-inline-item">Name: {{ $city->name }}</li>
					</ul>
				</div>

				<a href="{{ route('cities.show', ['city' => $city]) }}" class="btn btn-success">Read more &raquo;</a>
			</div>
		</article>
	@endforeach

	@auth
		<div class="mt-4">
			<a href="/cities/create" class="btn btn-dark">Create a new City</a>
		</div>
	@endauth
@endsection
