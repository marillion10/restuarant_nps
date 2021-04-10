<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\City;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('links/index', [
			'links' => Link::all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a link.');

		return view('links/create', ['restaurant' => $restaurant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a link.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a county for a link.');
		}

        $validator = Validator::make($request->all(), [
            'name' => 'unique:links'

          ]);

          if ($validator->fails()) {
            return redirect()->back()->with('warning', 'Link already exists choose another name');
          }

		$link = Auth::user()->links()->create([
			'name' => $request->input('name'),
		]);

		return redirect()->route('links.show', ['link' => $link]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return view('links/show', ['link' => $link]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to edit this link.');

		return view('links/edit', ['link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to edit this link.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the link.');
		}

		$link->update([
			'name' => $request->input('name'),
		]);

		return redirect()->route('links.show', ['link' => $link])->with('success', 'link updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to delete this link.');

		$link->delete();

		return redirect()->route('links.index')->with('success', 'link has been deleted');
    }
}
