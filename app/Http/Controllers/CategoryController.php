<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\Create;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        if(! (new Category())->create($request->all())) {
            return redirect()
                ->back()
                ->withErrors(
                    ['msg1' => 'An error occurred on category create, try again later...']
                );
        }

        return redirect('categories')
            ->with(['title' => 'Success', 'message' => 'Category registered successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('pages.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Update $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Category $category)
    {
        if (!$category->fill($request->all())->save()) {
            return redirect()
                ->back()
                ->withErrors(['msg1' => 'An error occurred on category update, try again later...']);
        }

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!$category->delete()) {
            return redirect()
                ->back()
                ->withErrors(['msg1' => 'An error occurred on category delete, try again later...']);
        }

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Category deleted successfully']);
    }
}
