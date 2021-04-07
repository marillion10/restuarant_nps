@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger som erbjuder {{ $tag->name }} </h1>

			@foreach($tag->restaurants as $restaurant)


					<h5 class="card-title h5"><a class="text-decoration-none text-light" href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
					<div class="metadata">
						<ul class="list-inline">
							<li class="list-inline-item text-dark">Adress: {{$restaurant->address}} </li>
							<li class="list-inline-item text-dark">Telefon: {{$restaurant->tel}} </li>
						</ul>
            @endforeach

        <div class="mt-4">
            <a href="{{ route('cities.index') }}" class="btn btn-dark">Se städer med restauranger</a>
        </div>
    @endsection