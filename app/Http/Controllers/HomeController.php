<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $post = Post::with(['hospital'])->orderBy('created_at', 'desc')->take(3)->get();

        return view('website.index',compact('post'));
    }

    public function news()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $lastPost = Post::orderBy('created_at', 'desc')->take(3)->get();



        return view('website.news',compact('posts','lastPost'));
    }
    public function about()
    {



        return view('website.about');
    }
}
