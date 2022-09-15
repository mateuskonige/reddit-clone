<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        $posts = $community->posts()->paginate(5)->through(fn ($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
            'username' => $post->user->username,
            'slug' => $post->slug,
        ]);

        return Inertia::render('Frontend/Communities/Show', compact('community', 'posts'));
    }
}
