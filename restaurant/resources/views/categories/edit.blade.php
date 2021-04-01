@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Edit a category</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Edit category</h5>

			<form class="form" action="{{ route('categories.update', ['category' => $category]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Enter the title of your category" value="{{ $category->name }}" required>
				</div>

				<button type="submit" class="btn btn-success w-100">Update</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('categories.show', ['category' => $category]) }}" class="btn btn-secondary">&laquo; Back to categories</a>
	</div>
@endsection