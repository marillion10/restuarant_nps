@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Restaurants</h1>

	@foreach($restaurants as $restaurant)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title h5"><a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Date: {{$restaurant->created_at}} </li>
						<li class="list-inline-item">Adress: {{$restaurant->address}} </li>
						<li class="list-inline-item">
							Categories:
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

				<p class="excerpt">
					@if(empty($restaurant->excerpt))
					{{substr($restaurant->description, 0, 100) }}...
					@else
					{{ $restaurant->excerpt}}
					@endif
				</p>

				<a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-success">Read more &raquo;</a>

			</div>
		</article>
	@endforeach

@endsection
