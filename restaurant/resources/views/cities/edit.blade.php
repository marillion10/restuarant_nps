@extends('layouts/app')

@section('content')
	<h1>Edit City</h1>
	<h2 class="mb-3">{{ $city->name }}</h2>

	<form class="form" action="/cities/{{ $city->id }}" method="POST">
		@csrf
		@method('PUT')

		<div class="mb-3">
			<label for="name" class="form-label">Name of City</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter name of city" required value="{{ $city->name }}">
		</div>

		<button type="submit" class="btn btn-success w-100">Update</button>
	</form>

	<div class="mt-5">
		<a href="/cities" class="btn btn-secondary">&laquo; Back</a>
	</div>
@endsection