<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\Store;
use App\Http\Requests\Post\Update;
use App\Models\Category;
use App\Models\Post;
use App\Services\UploadFileService\UploadFileService;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify.category.count')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.posts.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        // Create post
        $post = Post::create($request->all());

        // Upload file
        $path = UploadFileService::run(
            $request->file('image'),
            "posts/{$post->id}",
            "public"
        );

        // Save image path
        $post->image = $path;
        $post->save();

        return redirect(route('posts.index'))
            ->with(['title' => 'Success', 'message' => 'Post registered successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('pages.posts.form', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Post $post)
    {
        if (!$post->fill($request->all())->save()) {
            return redirect()
                ->back()
                ->withErrors(['msg1' => 'An error occurred on category update, try again later...']);
        }

        // Upload file
        if ($request->hasFile('image')) {
            $path = UploadFileService::run(
                $request->file('image'),
                "posts/{$post->id}",
                "public"
            );

            // Delete old and save a new image path
            $post->deleteImage();
            $post->image = $path;
            $post->save();
        }

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->find($id);

        $deleted = false;

        if ($post->trashed()) {
            $post->deleteImage();
            $deleted = $post->forceDelete();
        } else {
            $deleted = $post->delete();
        }

        if (!$deleted) {
            return redirect()
                ->back()
                ->withErrors(['msg1' => 'An error occurred on post delete, try again later...']);
        }

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Post deleted successfully']);
    }

    /**
     * Show trashed resources
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('pages.posts.trashed', compact('posts'));
    }

    /**
     * Restore a deleted post
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();

        return redirect()
            ->back()
            ->with(['title' => 'Success', 'message' => 'Post restored successfully.']);
    }
}
