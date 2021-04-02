@extends('layouts/app')

@section('content')
	<h1 class="text-dark">categories</h1>

	@foreach($categories as $category)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Date: {{ $category->created_at }}</li>
						<li class="list-inline-item">Name: {{ $category->name }}</li>
					</ul>
				</div>

				<a href="{{ route('categories.show', ['category' => $category]) }}" class="btn btn-success">See restaurants &raquo;</a>
			</div>
		</article>
	@endforeach

	@auth
		<div class="mt-4">
			<a href="/categories/create" class="btn btn-dark">Create a new category</a>
		</div>
	@endauth
@endsection
