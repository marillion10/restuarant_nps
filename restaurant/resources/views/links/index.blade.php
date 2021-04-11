@extends('layouts/app')

@section('content')
<h1 class="text-light">Länkar</h1>

@foreach($links as $link)
<article class="card bg-dark text-light">
	<div class="card-body">
        <h5 class="card-title"><li class="list-inline-item">{{ $link->desc }}</li></h5>
	    <p class="card-title">{{ $link->url }}</p>

            @auth

			<div class="actions">
				<a href="{{ route('links.edit', ['link' => $link]) }}" class="btn btn-primary">Redigera länkar</a>

					<form action="{{ route('links.destroy', ['link' => $link]) }}" method="POST">
							@csrf
							@method('DELETE')
						<button type="submit" class="btn btn-danger">Ta bort länkar</button>
					</form>
			</div>
            @endauth
		</article>
	@endforeach
@endsection