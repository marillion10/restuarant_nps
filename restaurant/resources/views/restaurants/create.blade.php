@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Create new restaurant</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">New restaurant</h5>

			<form class="form" action="{{ route('restaurants.store') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Enter the name of your restaurant" required>
				</div>

				<div class="mb-3">
					<label for="address" class="form-label">Address</label>
					<textarea id="address" name="address" class="form-control"></textarea>
				</div>

             {{--    <div class="mb-3">
					<label for="city" class="form-label">city</label>
					<textarea id="city" name="city" class="form-control"></textarea>
				</div> --}}

				<div class="mb-3">
					<label for="description" class="form-label">Description</label>
					<textarea id="description" name="description" class="form-control" rows="10"></textarea>
				</div>

				<button type="submit" class="btn btn-dark w-100">Create</button>
			</form>
		</div>
	</div>
    @endsection