@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Counties</h1>

	@foreach($counties as $county)
		<article class="card">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('counties.show', ['county' => $county->id]) }}">{{ $county->name }}</a></h5>
				<div class="metadata">
					<ul class="list-inline">
						<li class="list-inline-item">Date: {{ $county->created_at }}</li>
						<li class="list-inline-item">Name: {{ $county->name }}</li>
					</ul>
				</div>

				<p class="excerpt">
					@if(empty($county->name))
					@endif
				</p>

				<a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-success">Read more &raquo;</a>
			</div>
		</article>
	@endforeach

	@auth
		<div class="mt-4">
			<a href="/counties/create" class="btn btn-dark">Create a new county</a>
		</div>
	@endauth
@endsection
