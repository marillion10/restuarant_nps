@extends('layouts/app')

@section('content')
	<h1 class="text-dark">categories</h1>

	<article class="card single-article">
		<div class="card-body">
			<h5 class="card-title">{{ $category->name }}</h5>
			<div class="metadata">
				<ul class="list-inline">
					<li class="list-inline-item">Date: {{ $category->created_at }}</li>
				</ul>
			</div>

			

			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the cities admin -->
			@auth
				@if(Illuminate\Support\Facades\Auth::user()->id === $category->admin->id)
					<div class="actions">
						<a href="{{ route('categories.create') }}" class="btn btn-dark">Create new category</a>
						<a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-success">Edit category</a>

						<form action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete category</button>
						</form>
					</div>
				@endif
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('categories.index') }}" class="btn btn-dark">Back to categories</a>
	</div>
@endsection