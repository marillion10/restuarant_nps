@extends('layouts/app')

@section('content')
<h1 class="text-dark">Restaurants</h1>

@foreach($restaurants as $restaurant)
	{{dd($restaurant)}}
@endforeach

@endsection