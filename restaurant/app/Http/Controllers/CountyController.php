<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('countys/index', [
			'countys' => County::all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a county.');

		return view('countys/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a county.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a county for the restaurant.');
		}

		$county = Auth::user()->countys()->create([
			'name' => $request->input('name'),
		]);

		return redirect()->route('countys.show', ['county' => $county]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        return view('countys/show', ['county' => $county]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
        abort_unless(Auth::check() && Auth::user()->id === $county->admin->id, 401, 'You have to be logged in as an admin to edit this county.');

		return view('countys/edit', ['county' => $county]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        abort_unless(Auth::check() && Auth::user()->id === $county->admin->id, 401, 'You have to be logged in as an admin to edit this county.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the county.');
		}

		$county->update([
			'name' => $request->input('name'),
		]);

		return redirect()->route('countys.show', ['county' => $county])->with('success', 'county updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        abort_unless(Auth::check() && Auth::user()->id === $county->admin->id, 401, 'You have to be logged in as an admin to delete this county.');

		$county->delete();

		return redirect()->route('countys.index')->with('success', 'County has been deleted');
    }
}
