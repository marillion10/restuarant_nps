@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Create new restaurant</h1>
    <h2 class="mb-3">{{ $city->name }}</h1>

	        <form class="form" action="/cities/{{ $city->id }}/restaurants" method="POST">
				@csrf

                <input type="hidden" name="city_id" value="{{$city->id}}">

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Enter the name of your restaurant" required>
				</div>

				<div class="mb-3">
					<label for="address" class="form-label">Address</label>
					<textarea id="address" name="address" class="form-control"></textarea>
				</div>

				<div class="mb-3">
					<label for="description" class="form-label">Description</label>
					<textarea id="description" name="description" class="form-control" rows="10"></textarea>
				</div>

                <fieldset class="mb-3">
					<legend>Category</legend>

					@foreach($categories as $category)
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
							<label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
						</div>
					@endforeach
				</fieldset>

				<button type="submit" class="btn btn-dark w-100">Create</button>
			</form>

            <div class="mt-5">
                <a href="/cities/{{ $city->id }}" class="btn btn-secondary">&laquo; Back</a>
            </div>
    @endsection