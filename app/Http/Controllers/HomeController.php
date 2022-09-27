<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $biography = Biography::where('publish', true)->latest()->get();
        $testimonials = Testimonial::where('publish', true)->latest()->get();
        $posts = Post::where('status', 'publish')->take(3)->latest()->get();
        return view('frontend.pages.home', compact('biography', 'testimonials', 'posts'));
    }

    public function blog()
    {
        $posts = Post::where('status', 'publish')->paginate(6);
        return view('frontend.pages.blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();
        $tags = Tag::all();
        $latest_posts = Post::where('status', 'publish')->take(5)->latest()->get();
        return view('frontend.pages.show', compact('post', 'categories', 'tags', 'latest_posts'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $posts = Post::where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->where('status', 'publish')
            ->paginate(6);
        return view('frontend.pages.blog', compact('posts'));
    }
}
