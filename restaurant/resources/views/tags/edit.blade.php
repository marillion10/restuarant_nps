@extends('layouts/app')

@section('content')
	<h1 class="text-light">Redigera kategori</h1>

	<div class="card bg-dark text-white">
		<div class="card-body">
			<h5 class="card-title">Redigera kategori</h5>

			<form class="form" action="{{ route('tags.update', ['tag' => $tag]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Namn</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Skriv namnet på kategorin" value="{{ $tag->name }}" required>
				</div>

				<button type="submit" class="btn btn-primary w-100">Uppdatera</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('tags.index') }}" class="btn btn-secondary">&laquo; Tillbaka till kategorier</a>
	</div>
@endsection