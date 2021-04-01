@extends('layouts/app')

@section('content')
	<h1 class="mb-3">{{ $city->name }}</h1>

<<<<<<< HEAD
	<h2>Restaurants</h2>
	<table class="table table-striped table-hover table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($city->restaurants as $restaurant)
				<tr>
					<td>{{ $restaurant->id }}</td>
					<td>{{ $restaurant->name }}</td>
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
=======
	<article class="card single-article">
		<div class="card-body">
			<h5 class="card-title">{{ $city->name }}</h5>

            @foreach($city->restaurants as $restaurant)
            <ul class="list-inline-item">
                    <li class="list-group-item">{{ $restaurant->id }}</li>
                    <li class="list-group-item">{{ $restaurant->name }}</li>
                    <li class="list-group-item">{{ $restaurant->address }}</li>
                    <li class="list-group-item">{{ $restaurant->description }}</li>

            </ul>
            <br>

            <br>
            @endforeach
			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the cities admin -->
			@auth
				@if(Illuminate\Support\Facades\Auth::user()->id === $city->admin->id)
					<div class="actions">

                            <a href="/cities/{{ $city->id }}/restaurants/create" class="btn btn-dark">Create a new restaurant</a>

						<a href="{{ route('cities.edit', ['city' => $city]) }}" class="btn btn-success">Edit city</a>

						<form action="{{ route('cities.destroy', ['city' => $city]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete city</button>
						</form>
					</div>
				@endif
			@endauth
		</div>
	</article>
>>>>>>> shakir_test2

	<div class="mt-5">
		<a href="/cities" class="btn btn-secondary">&laquo; Back</a>
	</div>
@endsection