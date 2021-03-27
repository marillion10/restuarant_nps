@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Restaurants</h1>

	@foreach($restaurants as $restaurant)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Date: {{ $restaurant->created_at }}</li>
						<li class="list-inline-item">Name: {{ $restaurant->name }}</li>
					</ul>
				</div>

				<p class="excerpt">
					@if(empty($restaurant->description))
						{{ substr($restaurant->address, 0, 100) }}...
						{{ substr($restaurant->city, 0, 100) }}...
					@else
						{{ $restaurant->excerpt }}
					@endif
				</p>

				<a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-success">Read more &raquo;</a>
			</div>
		</article>
	@endforeach

	@auth
		<div class="mt-4">
			<a href="/restaurants/create" class="btn btn-dark">Create a new Restaurant</a>
		</div>
	@endauth
@endsection
