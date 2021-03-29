@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Restaurants</h1>

	@foreach($restaurants as $restaurant)

        @if ($restaurant->county_id == $_GET['county_id'])


            <article class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
                    <div class="metadata">
                        <ul class="list-inline">
                            <li class="list-inline-item">Date: {{ $restaurant->created_at }}</li>
                            <li class="list-inline-item">Name: {{ $restaurant->name }}</li>
                        </ul>
                    </div>

                    <a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-success">Read more &raquo;</a>
                </div>
            </article>
        @endif
	@endforeach
@endsection
