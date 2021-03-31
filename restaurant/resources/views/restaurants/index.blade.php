@extends('layouts/app')

@section('content')
	<h1><strong>Here be list of restaurants</strong></h1>

	@if(count($resturants) > 0)
		<ul>
			@foreach($restaurants as $restaurant)
				<li>
					<a href="/resturants/{{ $resturant->id }}">
						{{ $restaurant->name }}
					</a>
				</li>
			@endforeach
		</ul>
    @endif
@endsection
