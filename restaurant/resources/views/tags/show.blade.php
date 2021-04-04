@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Tag</h1>

	
	<article class="card single-article">
		<div class="card-body">
			<h5 class="card-title">{{ $tag->name }}</h5>
			<div class="metadata">
				<ul class="list-inline">
					<li class="list-inline-item">Date: {{ $tag->created_at }}</li>
				</ul>
			</div>
			


			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the cities admin -->
			@auth
			
					<div class="actions">
						<a href="{{ route('tags.create') }}" class="btn btn-dark">Create new tag</a>
						<a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn btn-success">Edit tag</a>

						<form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete tag</button>
						</form>
					</div>
				
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('tags.index') }}" class="btn btn-dark">Back to tags</a>
	</div>
@endsection