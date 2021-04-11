<?php

namespace App\Http\Controllers;

use App\Models\Link;
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

		if (!$request->filled('desc')) {
			return redirect()->back()->with('warning', 'Please enter a link.');
		}

        $validator = Validator::make($request->all(), [
            'desc' => 'unique:links'

          ]);

          if ($validator->fails()) {
            return redirect()->back()->with('warning', 'Link already exists choose another name');
          }

		$link = Link::create([
			'desc' => $request->input('desc'),
            'linktype_id' => $request->input('linktype_id'),
            'restaurant_id' => $request->input('restaurant_id'),
            'url' => $request->input('url'),
		]);

		return redirect()->route('links.show', ['link' => $link]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link, Restaurant $restaurant)
    {
        return view('links/show', ['link' => $link, 'restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
