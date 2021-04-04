@extends('layouts/app')

@section('content')
<h1 class="text-dark">Categories</h1>

	@foreach($tags as $tag)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('tags.show', ['tag' => $tag->id]) }}">{{ $tag->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Date: {{ $tag->created_at }}</li>
						<li class="list-inline-item">Name: {{ $tag->name }}</li>
					</ul>
				</div>

				<div class="actions">
				<a href="{{ route('tags.show', ['tag' => $tag]) }}" class="btn btn-dark">See Cities &raquo;</a>

				<a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn btn-success">Edit Category</a>

						<form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Delete Category</button>
						</form>

				
			</div>
		</article>
		
	@endforeach
	

	@auth
		<div class="mt-4">
			<a href="/tags/create" class="btn btn-dark">Create a new Category</a>
		</div>
	@endauth
@endsection
