@extends('layouts/app')

@section('content')
<h1 class="text-light">Länkar</h1>

	@foreach($links as $link)
		<article class="card bg-dark text-white">
			<div class="card-body">

                        <h5 class="card-title"><li class="list-inline-item">{{ $link->name }}</li></h5>

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

 	    @auth
		    <div class="mt-4">
			    <a href="/links/create" class="btn btn-dark">skapa en ny länk</a>
		    </div>
	    @endauth
@endsection