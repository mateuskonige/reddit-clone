<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->firstOrFail();
        $post = Post::where('slug', $slug)->with('user')->firstOrFail();

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post'));
    }
}
