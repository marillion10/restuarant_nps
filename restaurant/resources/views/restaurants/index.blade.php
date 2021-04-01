@extends('layouts/app')

@section('content')
	<h1><strong>Here be list of restaurants</strong></h1>

	@foreach($restaurants as $restaurant)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>

				<a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-success">Read more &raquo;</a>

			</div>
		</article>
	@endforeach

@endsection
