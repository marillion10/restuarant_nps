@extends('layouts/app')

@section('content')
	<h1>Edit: {{ $restaurant->title }}</h1>
	<h2 class="mb-3">{{ $city->name }}</h1>

	<form class="form" action="/cities/{{ $city->id }}/restaurants/{{ $restaurant->id }}" method="POST">
		@csrf
		@method('PUT')

		<input type="hidden" name="city_id" value="{{$city->id}}">

		<div class="mb-3">
			<label for="name" class="form-label">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter name of restaurant" required value="{{ $restaurant->name }}">
		</div>

        <div class="mb-3">
			<label for="address" class="form-label">Address</label>
			<textarea id="address" name="address" class="form-control">{{ $restaurant->address }}</textarea>
		</div>

                <div class="mb-3">
					<label for="description" class="form-label">Description</label>
					<textarea id="description" name="description" class="form-control" rows="10">{{ $restaurant->description }}</textarea>
				</div>

	<div class="mt-5">
		<a href="/cities/{{ $city->id }}" class="btn btn-secondary">&laquo; Back</a>
	</div>
@endsection