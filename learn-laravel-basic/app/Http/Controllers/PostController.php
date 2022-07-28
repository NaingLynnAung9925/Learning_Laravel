<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;

use Illuminate\Support\Facades\Storage;

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
    public function create(Category $category)
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
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $requestData =$request->all();
        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName();
        $path =  $file->storeAs('images', $fileName);
        $requestData["image"] = '/storage/'."$path";

        
        // $post = new Post;
        // $requestData =$request->all();
        // $path = public_path('images');
        // $file = $request->file('image');
        // $fileName = time().'_'.$file->getClientOriginalName();
        // $file->move($path, $fileName);
        // $requestData["image"] = '/images/'.$fileName;


        

        $posts = $post->create($requestData);
        $category = Category::whereIn('name', $request->categories)->get();
        $posts->categories()->attach($category);
        return redirect()->route('posts.index')->with('success', "Post created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Model\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['title' => "$post->title", 'body' => "$post->body", 'image' => "$post->image"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Model\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {

        

        $post = Post::find($id);

        $filePath = public_path($post->image) ;
        if(file_exists($filePath)){
            unlink($filePath);
        }

        $requestData =$request->all();
        $path = public_path('images');
        $file = $request->file('image');
        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        $file->move($path, $fileName);
        $requestData["image"] = '/images/'.$fileName;

        $category = Category::where('name', $request->categories)->get();
        $post->categories()->attach($category);
        $post->update($requestData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Model\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $filePath = public_path($post->image) ;
        if(file_exists($filePath)){
            unlink($filePath);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}