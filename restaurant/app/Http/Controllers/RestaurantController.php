<?php

namespace App\Http\Controllers;

use App\Models\City;
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
    public function index(City $city)
    {
        return view('restaurants/index', [
			'restaurants' => $city->restaurant,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a restaurant.');

		return view('restaurants/create', ['city'=>$city]);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * POST `/cities/{city}/restaurants`
	 *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a restaurant.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the restaurant.');
		}

		$restaurant = Auth::user()->restaurants()->create([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
			'city_id' => $request->input('city_id'),
			'description' => $request->input('description'),
		]);

		return redirect("/cities/{$city->id}")
			->with("success", "Restaurant successfully created with ID {$restaurant->id}.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(City $city,Restaurant $restaurant)
    {
        return view('restaurants/show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * GET `/cities/{city}/restaurants/{restaurant}/edit`
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city ,Restaurant $restaurant)
    {
        abort_unless(Auth::check() && Auth::user()->id === $restaurant->admin->id, 401, 'You have to be logged in as the admin to edit this restaurant.');

		return view('restaurants/edit', ['city' => $city, 'restaurant' => $restaurant]);
        }

    /**
     * Update the specified resource in storage.
     *
     * PUT `/cities/{city}/restaurants/{restaurant}`
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city, Restaurant $restaurant)
    {
        abort_unless(Auth::check() && Auth::user()->id === $restaurant->admin->id, 401, 'You have to be logged in as the admin to edit this article.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a title for the restaurant.');
		}

		$restaurant->update([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
			'description' => $request->input('description'),
		]);

        // redirect user to `/cities/{city}`
        return redirect("/cities/{$city->id}")
        ->with("success", "Todo with ID {$restaurant->id} successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * DELETE `/cities/{city}/restaurants/{restaurant}`
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city, Restaurant $restaurant)
    {
        abort_unless(Auth::check() && Auth::user()->id === $restaurant->admin->id, 401, 'You have to be logged in as the admin to delete this restaurant.');

		$restaurant->delete();

        return view('restaurants/index', [
			'restaurants' => $city->restaurant,
		]);
    }
}
