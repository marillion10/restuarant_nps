@extends('layouts/app')

@section('content')
	<h1 class="mb-3">Create a new City</h1>

	<form class="form" action="/cities" method="POST">
		@csrf

		<div class="mb-3">
			<label for="name" class="form-label">City</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter name of city" required>
		</div>

		<button type="submit" class="btn btn-success w-100">Create</button>
	</form>

	<div class="mt-5">
		<a href="/cities" class="btn btn-secondary">&laquo; Back</a>
	</div>
@endsection