@extends('layouts/app')

@section('content')
	<h1 class="text-dark">{{ $county->name }}</h1>

	<article class="card single-article">
		<div class="card-body">
			<h5 class="card-title">Restaurants in {{ $county->name }}</h5>
			<div class="metadata">
            </div>


			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the articles admin -->
			@auth
				@if(Illuminate\Support\Facades\Auth::user()->id === $county->admin->id)
					<div class="actions">
						<a href="{{ route('counties.create') }}" class="btn btn-dark">Create new county</a>

						<a href="{{ route('counties.edit', ['county' => $county]) }}" class="btn btn-success">Edit county</a>

						<form action="{{ route('counties.destroy', ['county' => $county]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete county</button>
						</form>
				@endif
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('counties.index') }}" class="btn btn-dark">Back to countys</a>
	</div>
@endsection