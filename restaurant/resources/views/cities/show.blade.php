@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Cities</h1>

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

	<div class="mt-4">
		<a href="{{ route('cities.index') }}" class="btn btn-dark">Back to cities</a>
	</div>
@endsection