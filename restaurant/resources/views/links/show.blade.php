@extends('layouts/app')

@section('content')
	<h1 class="text-light"> {{ $link->desc }} </h1>
    <h5 class="card-title text-light">{{ $link->url }}</h5>

    <div class="mt-4">
        <a href="{{ route('links.index') }}" class="btn btn-dark">Se länkar</a>
    </div>
    @endsection