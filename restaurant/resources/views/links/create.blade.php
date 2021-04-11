@extends('layouts/app')

@section('content')
	<h1 class="text-light">Skapa Länkar </h1>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Skapa Länkar</h5>

			<form class="form" action="{{ route('links.store') }}" method="POST">
				@csrf
            <input type="hidden" name="restaurant_id" value="{{1}}">

				<div class="mb-3">
					<label for="desc" class="form-label">Länk beskrivning</label>
                    <input type="desc" id="desc" name="desc" class="form-control" placeholder="Skriv in desc" >
                    <label for="name" class="form-label">URL</label>
					<input type="url" id="url" name="url" class="form-control" placeholder="Skriv in länk" >

                    <select name="linktype_id" id="linktype_id">
                        <option value="">Välja en länk</option>
                        <option value="1">Website</option>
                        <option value="2">Social</option>
                        <option value="1">Email</option>
                    </select>
				</div>


				<button type="submit" class="btn btn-dark w-100">Skapa länk</button>
			</form>
		</div>
	</div>
    @endsection