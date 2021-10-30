<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Vaccine;
use App\Hospital;

use Auth;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // all function here sh
        $this->middleware('auth:hospital')->except('show');
    }
    public function index()
    {
        // get id hospital user from Auth and then get all his posts from post table by relation between hospital table and post table , hospital_id
        $id = Auth::guard('hospital')->id();
        $posts = Post::where('hospital_id', $id)->get();

        return view('website.hospital.post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.hospital.post.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //get id user hospital from auth
        $id = Auth::guard('hospital')->id();
       // here validation to ensure  data inserted correctly
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        // create new post in table post
        $post = Post::create([
            'title'=>$request->title ,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description'=>$request->description ,
            'hospital_id' => $id,
            'published_at' => Carbon::now(),





        ]);
        // here insert image to database and save in storage
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            //insert to databsase
            $post->image = '/storage/post/' . $image_new_name;
            //save in database
            $post->save();
        }

        Session::flash('success', 'Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //show  specific post by slug and show it all users
        $post=Post::where('slug',$slug)->first();
        return view('website.hospital.post.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // show page edit with data of specific post
        return view('website.hospital.post.edit', compact(['post']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required:posts,title, $post->id",

            'description' => 'required',
        ]);

        //update all ofv data from view or request
        $post->title = $request->title;

        $post->slug = Str::slug($request->title);
        $post->description =  $request->description ;



        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }

        $post->save();

        Session::flash('success', 'Post updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // if post has image , in the first deleted image from storage and then delete post from database
        if($post){
            if(file_exists(public_path($post->image))){
                unlink(public_path($post->image));
            }

            $post->delete();
            Session::flash('success','Post deleted successfully');
        }

        return redirect()->back();
    }
}
