<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Tags/index', [
			'tags' => Tag::all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a tags.');

		return view('tags/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a tag.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a county for a tag.');
		}

		$tag = Auth::user()->tags()->create([
			'name' => $request->input('name'),
		]);

		return redirect()->route('tags.show', ['tag' => $tag]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags/show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        abort_unless(Auth::check() && Auth::user()->id === $tag->admin->id, 401, 'You have to be logged in as an admin to edit this tag.');

		return view('tags/edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        abort_unless(Auth::check() && Auth::user()->id === $tag->admin->id, 401, 'You have to be logged in as an admin to edit this category.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the category.');
		}

		$tag->update([
			'name' => $request->input('name'),
		]);

		return redirect()->route('tags.show', ['tag' => $tag])->with('success', 'category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        abort_unless(Auth::check() && Auth::user()->id === $tag->admin->id, 401, 'You have to be logged in as an admin to delete this category.');

		$tag->delete();

		return redirect()->route('tags.index')->with('success', 'tag has been deleted');
    }
}
