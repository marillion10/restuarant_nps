@extends('layouts/app')

@section('content')
	<h1>Cities</h1>

	<table class="table table-striped table-hover table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Restaurants</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cities as $city)
				<tr>
					<td>{{ $city->id }}</td>
					<td>{{ $city->name }}</td>
					<td>{{ $city->restaurants()->count() }}</td>
					<td>
						<div class="d-flex">
							<a href="/cities/{{ $city->id }}" class="btn btn-primary btn-sm me-1">View</a>
							<a href="/cities/{{ $city->id }}/edit" class="btn btn-warning btn-sm me-1">Edit</a>
							<form action="/cities/{{ $city->id }}" method="POST">
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
		<a href="/cities/create" class="btn btn-primary">Create a new City</a>
	</div>
@endsection
