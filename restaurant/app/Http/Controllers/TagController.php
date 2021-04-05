<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\City;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(City $city)
    {
        return view('Tags/index', [
			'tags' => Tag::all(), 'city' => $city
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a tags.');

		return view('tags/create', ['restaurant' => $restaurant]);
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

        $validator = Validator::make($request->all(), [
            'name' => 'unique:tags'

          ]);

          if ($validator->fails()) {
            return redirect()->back()->with('warning', 'Tag already exists choose another name');
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
    public function show(Tag $tag, Restaurant $restaurant, City $city)
    {
        return view('tags/show', ['tag' => $tag, 'restaurants' => $restaurant, 'city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to edit this tag.');

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
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to edit this category.');

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
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to delete this category.');

		$tag->delete();

		return redirect()->route('tags.index')->with('success', 'tag has been deleted');
    }
}