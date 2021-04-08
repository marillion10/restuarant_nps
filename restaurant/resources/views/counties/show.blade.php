@extends('layouts/app')

@section('content')
	<h2 class="text-light">Restauranger i {{ $county->name }}</h2>

	<article class="card single-article bg-dark text-white">
		<div class="card-body">
			<ul>
				<h5 class="card-title h4">Städer med restauranger i {{ $county->name }}</h5>
			<div class="metadata">
            </div>
			</ul>


            @foreach($county->cities as $city)
            <ul class="list-inline-item">
				<li class="list-unstyled">
					<a class="h5 text-decoration-none" href="{{ route('cities.show', ['city' => $city]) }}">Se restauranger i {{ $city->name }}</a>
				</li>
            </ul>

            <br>

            <br>
            @endforeach


			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the articles admin -->
			@auth
					<div class="actions">
						{{-- <a href="{{ route('counties.create') }}" class="btn btn-dark">Create new county</a> --}}

                        <a href="/counties/{{ $county->id }}/cities/create" class="btn btn-secondary">Skapa ny stad</a>

						<a href="{{ route('counties.edit', ['county' => $county]) }}" class="btn btn-primary">Redigera län</a>

						<form action="{{ route('counties.destroy', ['county' => $county]) }}" method="POST">
							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger">Ta bort län</button>
						</form>
			@endauth
		</div>
	</article>

	<div class="mt-4">
		<a href="{{ route('counties.index') }}" class="btn btn-dark">Tillbaka till län</a>
	</div>
@endsection