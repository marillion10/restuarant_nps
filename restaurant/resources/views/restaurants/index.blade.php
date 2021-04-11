@extends('layouts/app')

@section('content')
	<h1 class="text-light">Restauranger</h1>

	@foreach($restaurants as $restaurant)
		<article class="card border-0">
			<div class="card-body bg-dark text-white">
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
										return '<a class="text-decoration-none" href="/tags/' . $tag->id . '">' . $tag->name . '</a>';
									}
								)->implode("   ")
							 !!}
						</li>
                        <p>
                            <h3 class="h6">Länkar:</h3>
                            @foreach ($links as $link)
                            @if ( $link->restaurant_id === $restaurant->id)
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h5 class="text-decoration-none">{{$link->desc}}</h5>
                                    <a class="text-decoration-none" href="{{$link->url}}">{{$link->url}}</a>
                                </li>
                            </ul>
                            @endif
                            @endforeach
                            </p>
					</ul>
				</div>



				<a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-secondary">Läs mer &raquo;</a>

			</div>
		</article>
	@endforeach

@endsection
