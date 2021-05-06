@extends('layouts/app')

@section('content')

   @guest
        <h1 class="text-light">Skapa förslag på restaurang</h1>

        <form class="form bg-dark text-white pt-3" action="{{ route('suggestions.store') }}" method="POST">
            @csrf


            <div class="mb-3 ps-4 pe-4">
                <label for="name" class="form-label">Namn</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Skriv namnet på restaurangen"
                    required>
            </div>

            <div class="mb-3 ps-4 pe-4">
                <label for="address" class="form-label">Adress</label>
                <input id="address" name="address" class="form-control"
                    placeholder="Skriv adressen till restaurangen" required>
            </div>

            <div class="mb-3 ps-4 pe-4">
                <label for="tel" class="form-label">Telefon</label>
                <input id="tel" name="tel" class="form-control"
                    placeholder="Skriv telefon-nummer till restaurangen" required>
            </div>

            <div class="mb-3 ps-4 pe-4">
                <label for="description" class="form-label">Besrivning</label>
                <textarea id="description" name="description" class="form-control" placeholder="Beskriv restaurangen"
                    rows="10" required></textarea>
            </div>

            <div class="text-center pe-3 ps-3"><button type="submit" class="mb-3 btn btn-secondary w-100 ">Skicka</button></div>

        </form>

        <div class="mt-5">
            <a href="/restaurants/" class="btn btn-secondary">&laquo; Tillbaka</a>
        </div>
		
    @endguest

    @auth

	<h1 class="text-light">Förslag på restauranger: </h1>
            @foreach ($suggestions as $suggestion)
	<article class="card border-0">
		<div class="card-body bg-dark text-white">
			<div class="metadata">
				<ul class="list-inline">
					<li class="list-inline-item">Namn: {{ $suggestion->name }} </li>
					<br>
					<li class="list-inline-item">Adress: {{ $suggestion->address }} </li>
					<br>
					<li class="list-inline-item">Telefon: {{ $suggestion->tel }} </li>
					<hr>
					<li class="list-inline-item">Beskrivning: {{ $suggestion->description }} <li>
				</ul>
			</div>

            <form action="{{ route('suggestions.destroy', ['suggestion' => $suggestion]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Ta bort förslag</button>
            </form>
        </div>

	</article>
			



            @endforeach
			<div class="">
				<a href="/restaurants/" class="btn btn-secondary">&laquo; Tillbaka</a>
			</div>
        @endauth
    @endsection


