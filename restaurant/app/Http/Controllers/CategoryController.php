<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories/index', [
			'categories' => Category::all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a categories.');

		return view('categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401, 'You have to be logged in to create a category.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a county for a category.');
		}

		$category = Auth::user()->categories()->create([
			'name' => $request->input('name'),
		]);

		return redirect()->route('categories.show', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories/show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        abort_unless(Auth::check() && Auth::user()->id === $category->admin->id, 401, 'You have to be logged in as an admin to edit this category.');

		return view('categories/edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        abort_unless(Auth::check() && Auth::user()->id === $category->admin->id, 401, 'You have to be logged in as an admin to edit this category.');

		if (!$request->filled('name')) {
			return redirect()->back()->with('warning', 'Please enter a name for the category.');
		}

		$category->update([
			'name' => $request->input('name'),
		]);

		return redirect()->route('categories.show', ['category' => $category])->with('success', 'category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        abort_unless(Auth::check() && Auth::user()->id === $category->admin->id, 401, 'You have to be logged in as an admin to delete this category.');

		$category->delete();

		return redirect()->route('categories.index')->with('success', 'category has been deleted');
    }
}
