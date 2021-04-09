@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger som erbjuder {{ $tag->name }} </h1>

			@foreach($restaurants as $restaurant)

					<h5 class="card-title h5"><a class="text-decoration-none text-light" href="{{ route('restaurants.show', ['city' => $city, restaurant' => $restaurant]) }}">{{ $restaurant->name }}</a></h5>

            @endforeach



        <div class="mt-4">
            <a href="{{ route('cities.index') }}" class="btn btn-dark">Se städer med restauranger</a>
        </div>
    @endsection