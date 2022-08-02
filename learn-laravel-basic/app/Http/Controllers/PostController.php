<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use App\Mail\OrderMail;
use Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        $post = new Post;
        $requestData = $request->all();
        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        Storage::putFileAs('public/images', $request->file('image'), $fileName);
        $requestData['image'] = '/images/'.$fileName;
        $post = $post->create($requestData);

        $category = Category::whereIn('name', $request->categories)->get();
        $post->categories()->attach($category);
        return redirect()->route('posts.index')->with('success', "Post Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $post = Post::find($id);

        $filePath = '/storage/'.$post->image;
        if(file_exists($filePath)){
            unlink($filePath);
        }

        $requestData = $request->all();

        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        Storage::putFileAs('public/images', $request->file('image'), $fileName);
        $requestData['image'] = '/images/'.$fileName;

        $category = Category::whereIn('name', $request->categories)->get();
        $post->categories()->attach($category);
        $post->update($requestData);
        return redirect()->route('posts.index')->with('success', "Post Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', "Post Deleted Successfully");
    }

    public function order($id)
    {
        
        $postData = Post::find($id);
        Mail::to('scm.nainglynnaung@gmail.com')->send(new OrderMail($postData));
        return redirect()->route('posts.index')->with('success', 'Email sends successfully');
    }
}
