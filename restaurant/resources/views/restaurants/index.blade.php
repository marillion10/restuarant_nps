@extends('layouts/app')

@section('content')
	<h1><strong>Here be list of restaurants</strong></h1>

	@if(!empty($restaurants))
		<ul>
			@foreach($restaurants as $restaurant)
				<li>
					<a href="/restaurants/{{ $restaurant->id }}">
						{{ $restaurant->name }}
					</a>
				</li>
			@endforeach
		</ul>
    @endif
@endsection
