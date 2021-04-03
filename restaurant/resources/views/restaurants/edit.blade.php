@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Edit a restaurant</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Edit restaurant</h5>

			<form class="form" action="{{ route('restaurants.update', ['restaurant' => $restaurant]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Enter the name of your restaurant" value="{{ $restaurant->name }}" required>
				</div>

				<div class="mb-3">
					<label for="address" class="form-label">Address</label>
					<textarea id="address" name="address" class="form-control">{{ $restaurant->address }}</textarea>
				</div>

                <div class="mb-3">
					<label for="description" class="form-label">Description</label>
					<textarea id="description" name="description" class="form-control" rows="10">{{ $restaurant->description }}</textarea>
				</div>

				<fieldset class="mb-3">
					<legend>Category</legend>

					@foreach($categories as $category)
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @if($restaurant->categories->contains($category))checked @endif>
							<label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
						</div>
					@endforeach
				</fieldset>

				<button type="submit" class="btn btn-success w-100">Update</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-secondary">&laquo; Back to restaurant</a>
	</div>
@endsection