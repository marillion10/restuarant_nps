@extends('layouts/app')

@section('content')
	<h1 class="mb-3">{{ $city->name }}</h1>

	<h2>Restaurants</h2>
	<table class="table table-striped table-hover table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($city->restaurants as $restaurant)
				<tr>
					<td>{{ $restaurant->id }}</td>
					<td>{{ $restaurant->title }}</td>
					<td>
						<div class="d-flex">
							<a href="/cities/{{ $city->id }}/restaurants/{{ $restaurant->id }}" class="btn btn-primary btn-sm me-1">View</a>
							<a href="/cities/{{ $city->id }}/restaurants/{{ $restaurant->id }}/edit" class="btn btn-warning btn-sm me-1">Edit</a>
							<form action="/cities/{{ $city->id }}/restaurants/{{ $restaurant->id }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="mt-3">
		<a href="/cities/{{ $city->id }}/restaurants/create" class="btn btn-primary">Create a new Restaurant</a>
	</div>

	<div class="mt-5">
		<a href="/cities" class="btn btn-secondary">&laquo; Back</a>
	</div>
@endsection