@extends('layouts/app')

@section('content')
	<h1 class="text-light">Skapa Länkar </h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Skapa Länkar</h5>

			<form class="form" action="{{ route('links.store') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="name" class="form-label">Länktyp</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Skriv in länktyp" >
				</div>

				<button type="submit" class="btn btn-dark w-100">Skapa</button>
			</form>
		</div>
	</div>
    @endsection