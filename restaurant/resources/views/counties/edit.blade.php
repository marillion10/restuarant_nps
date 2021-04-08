@extends('layouts/app')

@section('content')
	<h1 class="text-light">Redigera län</h1>

	<div class="card bg-dark text-white">
		<div class="card-body">
			<h5 class="card-title">Redigera län</h5>

			<form class="form" action="{{ route('counties.update', ['county' => $county]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Namn</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Enter name of county" value="{{ $county->name }}" required>
				</div>

				<button type="submit" class="btn btn-primary w-100">Uppdatera</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary">&laquo; Tillbaka till län</a>
	</div>
@endsection