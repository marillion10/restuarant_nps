@extends('layouts/app')

@section('content')
	<h1 class="text-light">Redigera länk</h1>

	<div class="card bg-dark text-white">
		<div class="card-body">
			<h5 class="card-title">Redigera länk</h5>

			<form class="form" action="{{ route('links.update', ['link' => $link]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Länktyp</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Skriv namnet på länktyp" value="{{ $link->name }}" required>
				</div>

				<button type="submit" class="btn btn-primary w-100">Uppdatera</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('links.index') }}" class="btn btn-secondary">&laquo; Tillbaka till länkar</a>
	</div>
@endsection