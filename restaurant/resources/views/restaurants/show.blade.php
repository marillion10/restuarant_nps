@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Restaurant</h1>

	<article class="card single-article">
		<div class="card-body">
			<h5 class="card-title">{{ $restaurant->name }}</h5>
			<div class="metadata">
				<ul class="list-inline">
					<li class="list-inline-item">Date: {{ $restaurant->created_at }}</li>
				</ul>
			</div>

			<div class="excerpt">

					<p>{{ $restaurant->address }}</p>
					<p>{{ $restaurant->city }}</p>

			</div>

			<div class="content">
				<p>{{ str_replace('\n', '<br>', $restaurant->description) }}</p>
			</div>

			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the articles author -->
			@auth
				@if(Illuminate\Support\Facades\Auth::user()->id === $restaurant->author->id)
					<div class="actions">
						<a href="{{ route('restaurants.create') }}" class="btn btn-dark">Create new restaurant</a>
						<a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}" class="btn btn-success">Edit restaurant</a>

						<form action="{{ route('restaurants.destroy', ['restaurant' => $restaurant]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete restaurant</button>
						</form>
					</div>
				@endif
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('restaurants.index') }}" class="btn btn-dark">Back to restaurants</a>
	</div>
@endsection