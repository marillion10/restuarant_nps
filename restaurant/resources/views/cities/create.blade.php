@extends('layouts/app')

@section('content')
	<h1 class="mb-3">Create a new City</h1>

	<form class="form" action="/cities" method="POST">
		@csrf

	        <form class="form" action="/counties/{{ $county->id }}/cities" method="POST">
				@csrf

                <input type="hidden" name="county_id" value="{{$county->id}}">

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Enter the title of your city" required>
				</div>

	<div class="mt-5">
		<a href="/cities" class="btn btn-secondary">&laquo; Back</a>
	</div>
@endsection