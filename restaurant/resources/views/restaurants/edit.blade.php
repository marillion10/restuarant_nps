@extends('layouts/app')

@section('content')
	<h1 class="text-light">Redigera restaurang</h1>

	<div class="card border-0">
		<div class="card-body bg-dark text-white">
			<h5 class="card-title">Redigera restaurang</h5>

			<form class="form" action="{{ route('restaurants.update', ['city' => $city, 'restaurant' => $restaurant]) }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label">Namn</label>
					<input type="name" id="name" name="name" class="form-control" placeholder="Skriv namnet på restaurangen" value="{{ $restaurant->name }}" required>
				</div>

				<div class="mb-3">
					<label for="address" class="form-label">Adress</label>
					<textarea id="address" name="address" class="form-control">{{ $restaurant->address }}</textarea>
				</div>

                <div class="mb-3">
					<label for="description" class="form-label">Beskrivning</label>
					<textarea id="description" name="description" class="form-control" rows="10">{{ $restaurant->description }}</textarea>
				</div>

				<fieldset class="mb-3">
					<legend>Kategorier</legend>

					@foreach($tags as $tag)
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" @if($restaurant->tags->contains($tag))checked @endif>
							<label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
						</div>
					@endforeach
				</fieldset>

				<button type="submit" class="btn btn-primary w-100">Uppdatera</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('restaurants.show', ['city' => $city, 'restaurant' => $restaurant]) }}" class="btn btn-secondary">&laquo; Tillbaka</a>
	</div>
@endsection