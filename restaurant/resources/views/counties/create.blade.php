@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Create new county</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">New county</h5>

			<form class="form" action="{{ route('counties.store') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Enter name of county" required>
				</div>

				<button type="submit" class="btn btn-dark w-100">Create</button>
			</form>
		</div>
	</div>
    @endsection