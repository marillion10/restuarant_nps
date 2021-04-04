@extends('layouts/app')

@section('content')
<h1 class="text-dark">Tags</h1>

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

				<a href="{{ route('tags.show', ['tag' => $tag]) }}" class="btn btn-success">See restaurants &raquo;</a>
			</div>
		</article>
	@endforeach

	@auth
		<div class="mt-4">
			<a href="/tags/create" class="btn btn-dark">Create a new tag</a>
		</div>
	@endauth
@endsection
