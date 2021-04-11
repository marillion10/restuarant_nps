@extends('layouts/app')

@section('content')
    <h1 class="text-light">Restauranger som erbjuder {{ $tag->name }} </h1>

    @foreach ($tag->restaurants as $restaurant)
        <article class="card single-article bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title h5"><a class="text-decoration-none text-primary"
                        href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}">{{ $restaurant->name }}</a>
                </h5>
                <div class="metadata">
                    <ul class="list-inline">
                        <li class="list-inline-item text-light">Adress: {{ $restaurant->address }} </li>
                        <li class="list-inline-item text-light">Telefon: {{ $restaurant->tel }} </li>
                    </ul>
                </div>
			</article>
    @endforeach
    <div class="mt-4">
        <a href="{{ route('cities.index') }}" class="btn btn-secondary">Se städer med restauranger</a>
    </div>
@endsection
