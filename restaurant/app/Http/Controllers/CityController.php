<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cities/index', [
			'cities' => city::all(),
		]);
    }

    public function showByTag(City $city, Tag $tag) {

        $restaurants_with_tag = $city->restaurants()->whereHas('tags', function (\Illuminate\Database\Eloquent\Builder $query) use($tag) {
        $query->where('tags.id', $tag->id);
    })
    ->get();

        return view('cities/show_by_tag', ['tag' => $tag, 'city' => $city, 'restaurants_with_tag' => $restaurants_with_tag]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(County $county)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a city.');

		return view('cities/create', ['county'=>$county]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a city.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the city.');
		}

        $validator = Validator::make($request->all(), [
            'name' => 'unique:cities'

          ]);

          if ($validator->fails()) {
            return redirect()->back()->with('warning', 'City already exists choose another name');
          }

		$city = Auth::user()->cities()->create([
			'name' => $request->input('name'),
			'county_id' => $request->input('county_id'),
		]);

		return redirect()->route('cities.show', ['city' => $city]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('cities/show', ['city' => $city, 'tags' => Tag::orderby('name')->get()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        abort_unless(Auth::check(), 401, 'You must be logged in as admin to edit city.');

		return view('cities/edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as the admin to edit this city.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a title for the city.');
		}

		$city->update([
			'name' => $request->input('name'),
		]);

		return redirect()->route('cities.show', ['city' => $city])->with('success', 'city updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in as the admin to delete this city.');

		$city->delete();

		return redirect()->route('cities.index')->with('success', 'City has been deleted');
    }
}
