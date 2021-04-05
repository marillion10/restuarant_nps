@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Cities</h1>

	<article class="card single-article">
		<div class="card-body">
			<h5 class="card-title">{{ $city->name }}</h5>

			@foreach($city->restaurants as $restaurant)
					<h5 class="card-title h5"><a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
					<div class="metadata">
						<ul class="list-inline">
							<li class="list-inline-item">Date: {{$restaurant->created_at}} </li>
							<li class="list-inline-item">Adress: {{$restaurant->address}} </li>
							<li class="list-inline-item">
								Tags:
								{!!
									$restaurant->tags->map(
										function($tag) {
											return '<a href="/tags/' . $tag->id . '">' . $tag->name . '</a>';
										}
									)->implode(", ")
								 !!}
							</li>

						</ul>
					</div>

            </ul>
            <br>

            <br>
            @endforeach
			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the cities admin -->
			@auth

					<div class="actions">
                            <a href="/cities/{{ $city->id }}/restaurants/create" class="btn btn-dark">Create a new restaurant</a>

						<a href="{{ route('cities.edit', ['city' => $city]) }}" class="btn btn-success">Edit city</a>

						<form action="{{ route('cities.destroy', ['city' => $city]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete city</button>
						</form>
					</div>
			@endauth


	<div class="mt-4">
		<a href="{{ route('cities.index') }}" class="btn btn-dark">Back to cities</a>
	</div>
@endsection