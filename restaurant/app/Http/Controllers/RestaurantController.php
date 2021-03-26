<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurants/index', [
			'restaurants' => Restaurant::all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a restaurant.');

		return view('restaurants/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a restaurant.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the restaurant.');
		}

		$restaurant = Auth::user()->restaurants()->create([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
			'city' => $request->input('city'),
			'description' => $request->input('description'),
		]);

		return redirect()->route('restaurants.show', ['restaurant' => $restaurant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants/show', ['restaurant' => $restaurant]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        abort_unless(Auth::check() && Auth::user()->id === $restaurant->admin->id, 401, 'You have to be logged in as the admin to edit this article.');

		return view('restaurants/edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        abort_unless(Auth::check() && Auth::user()->id === $restaurant->admin->id, 401, 'You have to be logged in as the admin to edit this article.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a title for the restaurant.');
		}

		$restaurant->update([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
			'city' => $request->input('city'),
			'description' => $request->input('description'),
		]);

		return redirect()->route('restaurants.show', ['restaurant' => $restaurant])->with('success', 'restaurant updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        abort_unless(Auth::check() && Auth::user()->id === $restaurant->admin->id, 401, 'You have to be logged in as the admin to delete this restaurant.');

		$restaurant->delete();

		return redirect()->route('restaurants.index')->with('success', 'Restaurant has been deleted');
    }
}
