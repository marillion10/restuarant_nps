@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger i {{ $city->name }}</h1>

	<article class="card single-article bg-dark text-white">
                <h5 class="p-3">Se vilka restauranger i {{ $city->name }} som erbjuder</h5>

                <ul class="list-inline ps-3">

					@foreach($tags as $tag)
						<li class="list-inline-item"><a class="text-decoration-none" href="{{ route('cities.show.tag', ['city' => $city, 'tag' => $tag->id]) }}">{{ $tag->name }}</a>
                        </li>
					@endforeach
                </ul>

		<div class="card-body">
			@foreach($city->restaurants as $restaurant)
					<h5 class="card-title h5"><a class="text-decoration-none" href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
					<div class="metadata">
						<ul class="list-inline">
							<li class="list-inline-item">Adress: {{$restaurant->address}} </li>
							<li class="list-inline-item">Telefon: {{$restaurant->tel}} </li>
							<li class="list-inline-item">
								Kategorier:
								{!!
									$restaurant->tags->map(
										function($tag) {
											return '<a class="text-decoration-none list-inline-item" href="/tags/' . $tag->id . '">' . $tag->name . '</a>';
										}
									)->implode(" ")
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

                            <a href="/cities/{{ $city->id }}/restaurants/create" class="btn btn-secondary">Skapa ny restaurang</a>

						<a href="{{ route('cities.edit', ['city' => $city]) }}" class="btn btn-primary">Redigera stad</a>

						<form action="{{ route('cities.destroy', ['city' => $city]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Ta bort stad</button>
						</form>
					</div>
			@endauth


	<div class="mt-4">
		<a href="{{ route('cities.index') }}" class="btn btn-dark">Tillbaka till städer</a>
	</div>
@endsection