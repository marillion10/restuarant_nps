@extends('layouts/app')

@section('content')
	<h1 class="text-light"> {{ $link->name }} </h1>

    <h5 class="card-title h5"><a class="text-decoration-none text-light" >{{ $link->name }}</a></h5>

    <div class="mt-4">
        <a href="{{ route('links.index') }}" class="btn btn-dark">Se länkar</a>
    </div>
    @endsection