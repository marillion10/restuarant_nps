<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suggestions/add', [
			'suggestions' => Suggestion::all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the restaurant.');
		}

		Suggestion::create([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
			'tel' => $request->input('tel'),
			'city_id' => $request->input('city_id'),
			'description' => $request->input('description'),
		]);


        // redirect user to the nowly created restaurant
		return redirect()->route('suggestions.index')
			->with("success", "Your suggestion has been sent.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to delete this category.');

        $suggestion->delete();

        return redirect()->route('suggestions.index')->with('success', 'Restaurant has been deleted');
    }
}
