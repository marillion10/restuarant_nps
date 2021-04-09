@extends('layouts/app')

@section('content')
	<h1 class="text-light">Skapa restaurang</h1>
    <h2 class="mb-3 text-light">{{ $city->name }}</h1>

	        <form class="form bg-dark text-white pt-3" action="{{ route('restaurants.store', ['city' => $city]) }}" method="POST">
				@csrf

                <input type="hidden" name="city_id" value="{{$city->id}}">

				<div class="mb-3 ps-4 pe-4">
					<label for="name" class="form-label">Namn</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Skriv namnet på restaurangen" required>
				</div>

				<div class="mb-3 ps-4 pe-4">
					<label for="address" class="form-label">Adress</label>
					<textarea id="address" name="address" class="form-control"></textarea>
				</div>

                <div class="mb-3 ps-4 pe-4">
					<label for="tel" class="form-label">Telefon</label>
					<textarea id="tel" name="tel" class="form-control"></textarea>
				</div>

				<div class="mb-3 ps-4 pe-4">
					<label for="description" class="form-label">Besrivning</label>
					<textarea id="description" name="description" class="form-control" rows="10"></textarea>
				</div>

                <fieldset class="mb-3 ps-4 pe-4">
					<legend>Kategorier</legend>

					@foreach($tags as $tag)
						<div class="form-check form-check-inline ps-4">
							<input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
							<label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
						</div>
					@endforeach
				</fieldset>
                <div class="text-center pe-3 ps-3"><button type="submit" class="mb-3 btn btn-secondary w-100 ">Skapa restaurang</button></div>

			</form>

            <div class="mt-5">
                <a href="/cities/{{ $city->id }}" class="btn btn-secondary">&laquo; Tillbaka</a>
            </div>
    @endsection