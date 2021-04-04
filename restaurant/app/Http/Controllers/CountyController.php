<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('counties/index', [
			'counties' => County::all(),
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

		return view('counties/create');
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

        $validator = Validator::make($request->all(), [
            'name' => 'unique:counties'
            
          ]);
          
          if ($validator->fails()) {
            return redirect()->back()->with('warning', 'County already exists choose another name');
          }

		$county = Auth::user()->counties()->create([   // 42
			'name' => $request->input('name'),
		]);

		return redirect()->route('counties.show', ['county' => $county]);    // counties/42
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        return view('counties/show', ['county' => $county]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to edit this county.');

		return view('counties/edit', ['county' => $county]);
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
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to edit this county.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the county.');
		}

		$county->update([
			'name' => $request->input('name'),
		]);

		return redirect()->route('counties.show', ['county' => $county])->with('success', 'county updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as an admin to delete this county.');

		$county->delete();

		return redirect()->route('counties.index')->with('success', 'County has been deleted');
    }
}
