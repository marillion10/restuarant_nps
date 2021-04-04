@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Edit a tag</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Edit tag</h5>

			<form class="form" action="{{ route('tags.update', ['tag' => $tag]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Enter the title of your tag" value="{{ $tag->name }}" required>
				</div>

				<button type="submit" class="btn btn-success w-100">Update</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('tags.show', ['tag' => $tag]) }}" class="btn btn-secondary">&laquo; Back to tags</a>
	</div>
@endsection