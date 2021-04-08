@extends('layouts/app')

@section('content')
	<h1 class="text-light">Skapa kategori</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Skapa kategori</h5>

			<form class="form" action="{{ route('tags.store') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="name" class="form-label">Namn</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Skriv in namnet på kategorin" >
				</div>

				<button type="submit" class="btn btn-dark w-100">Skapa</button>
			</form>
		</div>
	</div>
    @endsection