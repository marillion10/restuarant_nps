@extends('layouts/app')

@section('content')
	<h1 class="text-dark">Create new tag</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">New tag</h5>

			<form class="form" action="{{ route('tags.store') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Enter the title of your Tag" >
				</div>

				<button type="submit" class="btn btn-dark w-100">Create</button>
			</form>
		</div>
	</div>
    @endsection