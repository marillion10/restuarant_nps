@extends('layouts/app')

@section('content')
	<strong>Here be list of restaurants</strong>

	@if(count($restaurants) > 0)
		<ul>
			@foreach($restaurants as $restaurant)
				<li>
					<a href="/restaurants/{{ $restaurant->id }}">
						{{ $restaurant->name }}
					</a>
				</li>
			@endforeach
		</ul>
@endsection
