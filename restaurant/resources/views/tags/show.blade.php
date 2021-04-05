@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Restauranger med {{ $tag->name }} </h1>

			@foreach($tag->restaurants as $restaurant)


					<h5 class="card-title h5"><a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
					<div class="metadata">
						<ul class="list-inline">
							<li class="list-inline-item">Date: {{$restaurant->created_at}} </li>
							<li class="list-inline-item">Adress: {{$restaurant->address}} </li>
						</ul>
            @endforeach

        <div class="mt-4">
            <a href="{{ route('tags.index') }}" class="btn btn-dark">Go to categories</a>
        </div>
    @endsection