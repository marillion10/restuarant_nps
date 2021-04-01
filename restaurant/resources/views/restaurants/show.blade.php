@extends('layouts/app')

@section('content')
	<h1 class="mb-3">{{ $restaurant->name }}</h1>

	<div class="meta mb-3">
		<dl class="row">
			<dt class="col-sm-2">city</dt>
			<dd class="col-sm-10">
				<a href="/citys/{{ $restaurant->city->id }}">
					{{ $restaurant->city->name }}
				</a>
			</dd>

			<dt class="col-sm-2">Created at</dt>
			<dd class="col-sm-10">
				{{ $restaurant->created_at }}
			</dd>

			<dt class="col-sm-2">Last updated at</dt>
			<dd class="col-sm-10">
				{{ $restaurant->updated_at }}
			</dd>

		</dl>
	</div>

			<!-- check if someone is logged in, and if so, check if the authenticated user is the same as the articles admin -->
			@auth
				@if(Illuminate\Support\Facades\Auth::user()->id === $restaurant->admin->id)
					<div class="actions">
						<a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}" class="btn btn-success">Edit restaurant</a>

	<div class="mt-5">
		<a href="/cities/{{ $restaurant->city->id }}" class="btn btn-secondary">&laquo; Back to the city</a>
	</div>
@endsection
