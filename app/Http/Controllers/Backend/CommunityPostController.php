<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityPostStoreRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        return Inertia::render('Communities/Posts/Create', compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunityPostStoreRequest $request, $slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        $validated = $request->validated();

        $community->posts()->create([
            'user_id' => auth()->id(),
            'community_id' => $community->id,
            'title' => $validated['title'],
            'url' => $validated['url'],
            'description' => $validated['description'],
        ]);

        return Redirect::route('frontend.communities.show', $community->slug)->with('message', "Post added successfully to {$community->name}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->firstOrFail();
        $post = Post::where('slug', $slug)->with('user')->firstOrFail();

        return Inertia::render('Communities/Posts/Edit', compact('community', 'post'));
    }

    public function update(CommunityPostStoreRequest $request, $community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->firstOrFail();
        $post = Post::where('slug', $slug)->with('user')->firstOrFail();

        $post->update($request->validated());

        return Redirect::route('frontend.communities.posts.show', [$community->slug, $slug])->with('message', "Post edited successfully to {$community->name}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
