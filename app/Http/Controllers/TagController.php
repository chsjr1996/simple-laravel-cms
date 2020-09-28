<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\Store;
use App\Http\Requests\Tag\Update;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('pages.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tags.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if(! (new Tag())->create($request->all())) {
            return redirect()
                ->back()
                ->withErrors(
                    ['msg1' => 'An error occurred on tag create, try again later...']
                );
        }

        return redirect('tags')
            ->with(['title' => 'Success', 'message' => 'Tag registered successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('pages.tags.form', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Update $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Tag $tag)
    {
        if (!$tag->fill($request->all())->save()) {
            return redirect()
                ->back()
                ->withErrors(['msg1' => 'An error occurred on tag update, try again later...']);
        }

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Tag updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if (!$tag->delete()) {
            return redirect()
                ->back()
                ->withErrors(['msg1' => 'An error occurred on tag delete, try again later...']);
        }

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Tag deleted successfully']);
    }
}
