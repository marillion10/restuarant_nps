@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger</h1>

	@foreach($restaurants as $restaurant)
		<article class="card border-0">
			<div class="card-body bg-dark text-white">
				<h5 class="card-title h5"><a class="text-decoration-none" href="{{ route('restaurants.show', ['restaurant' => $restaurant->slug]) }}">{{ $restaurant->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Adress: {{$restaurant->address}} </li>
						<li class="list-inline-item">Telefon: {{$restaurant->tel}} </li>
						<li class="list-inline-item">
						    Kategorier:
							{!!
								$restaurant->tags->map(
									function($tag) {
										return '<a class="text-decoration-none" href="/tags/' . $tag->id . '">' . $tag->name . '</a>';
									}
								)->implode("   ")
							 !!}
						</li>

					</ul>
				</div>



				<a href="{{ route('restaurants.show', ['restaurant' => $restaurant->slug]) }}" class="btn btn-secondary">Läs mer &raquo;</a>

			</div>
		</article>
	@endforeach

@endsection
