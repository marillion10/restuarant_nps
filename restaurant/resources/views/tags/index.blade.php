@extends('layouts/app')

@section('content')
<h1 class="text-light">Kategorier</h1>

	@foreach($tags as $tag)
		<article class="card bg-dark text-white">
			<div class="card-body">

                        <h5 class="card-title"><li class="list-inline-item">{{ $tag->name }}</li></h5>

            @auth

			<div class="actions">

				<a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn btn-primary">Redigera Kategori</a>

					<form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST">
							@csrf
							@method('DELETE')

						<button type="submit" class="btn btn-danger">Ta bort kategori</button>
					</form>
			</div>
            @endauth
		</article>


	@endforeach

 	    @auth
		    <div class="mt-4">
			    <a href="/tags/create" class="btn btn-dark">skapa en ny kategori</a>
		    </div>
	    @endauth
@endsection