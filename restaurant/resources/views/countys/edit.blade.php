@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Edit a county</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Edit restaurant</h5>

			<form class="form" action="{{ route('countys.update', ['county' => $county]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Enter name of county" value="{{ $county->name }}" required>
				</div>

				<button type="submit" class="btn btn-success w-100">Update</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('countys.show', ['county' => $county]) }}" class="btn btn-secondary">&laquo; Back to countys</a>
	</div>
@endsection