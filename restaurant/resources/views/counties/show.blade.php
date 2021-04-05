@extends('layouts/app')

@section('content')
	<h1 class="text-dark">{{ $county->name }}</h1>

	<article class="card single-article">
		<div class="card-body">
				<h5 class="card-title h4">Restaurants in {{ $county->name }}</h5>
			<div class="metadata">
            </div>
			
			


            @foreach($county->cities as $city)
				<li class="list-unstyled">
					<a class=" h5" href="{{ route('cities.show', ['city' => $city]) }}">{{ $city->name }}</a>
					
				</li>

            <br>

            <br>
            @endforeach


			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the articles admin -->
			@auth
					<div class="actions">
						{{-- <a href="{{ route('counties.create') }}" class="btn btn-dark">Create new county</a> --}}

                        <a href="/counties/{{ $county->id }}/cities/create" class="btn btn-dark">Create a new city</a>

						<a href="{{ route('counties.edit', ['county' => $county]) }}" class="btn btn-success">Edit county</a>

						<form action="{{ route('counties.destroy', ['county' => $county]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete county</button>
						</form>
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('counties.index') }}" class="btn btn-dark">Back to countys</a>
	</div>
@endsection