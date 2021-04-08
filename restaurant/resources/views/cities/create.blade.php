@extends('layouts/app')

@section('content')
	<h1 class="text-light">Skapa stad</h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Skapa stad</h5>

	        <form class="form" action="/counties/{{ $county->id }}/cities" method="POST">
				@csrf

                <input type="hidden" name="county_id" value="{{$county->id}}">

				<div class="mb-3">
					<label for="name" class="form-label">Namn</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Skriv namnet på staden">
				</div>

				<button type="submit" class="btn btn-dark w-100">Skapa</button>
			</form>
		</div>
	</div>
    @endsection