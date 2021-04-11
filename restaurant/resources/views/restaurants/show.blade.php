@extends('layouts/app')

@section('content')
	<h1 class="text-light">{{ $restaurant->name }}</h1>

	<article class="card single-article bg-dark text-white">
		<div class="card-body">
			<h5 class="card-title h4">{{ $restaurant->name }}</h5>
			<div class="metadata">
				<ul class="list-inline">
					<li class="list-inline-item">Telefon: {{ $restaurant->tel }}</li>
				</ul>
			</div>

			<div class="excerpt">

					<p>{{ $restaurant->address }}</p>
			</div>

			<div class="content">
				<p>{{ str_replace('\n', '<br>', $restaurant->description) }}</p>
			</div>

			<hr />

			<p>
				<h3 class="h6">Kategorier:</h3>
				<ul class="list-inline">
				@foreach ($restaurant->tags as $tag)
				<li class="list-inline-item">
					<a class="text-decoration-none" href="/tags/{{$tag->id}}">{{$tag->name}}</a>
				</li>
				@endforeach
				</ul>
			</p>
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

			{{-- check if someone is logged in, and if so, check if the authenticated user is the same as the articles admin --}}
			@auth
					<div class="actions">

                        <a href="{{ route('links.create', ['restaurant' => $restaurant]) }}" class="btn btn-dark">skapa en ny länk</a>

						<a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}" class="btn btn-primary">Redigera restaurang</a>

						<form action="{{ route('restaurants.destroy', ['restaurant' => $restaurant]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Ta bort restaurang</button>
						</form>
					</div>
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('restaurants.index') }}" class="btn btn-dark">Tillbaka till restauranger</a>
	</div>
@endsection