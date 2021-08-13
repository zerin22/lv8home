<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       // $posts= Post::all();

       $posts = Post::orderBy('id', 'DESC')->simplePaginate(5);

        return view('posts.index', compact('posts'));
    }

    //POST CREATE
    public function create()
    {
        return view('posts.create');
    }

    //POST STORE
    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate(
            [
                'name'        => 'required',
                'category'    => 'required',
                'description' => 'required|min:5|max:50'
            ]
        );

        $validatedData['status'] = 'enable';

        $post = new Post();

        $post->create($validatedData);

        return redirect()->route('post.index')->with('successMessage', 'Post Successfully Created');

    }

    //SHOW SINGLE POST
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    //EDIT SINGLE POST
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validatedData = $request->validate(
            [
                'name'        => 'required',
                'category'    => 'required',
                'description' => 'required|min:5|max:50',
                'status'       => 'required'
            ]
        );

        $post->update($validatedData);

        return redirect()->route('post.edit', $post->id)->with('successMessage', 'Post Successfully Updated');

    }

    //DELETE SINGLE POST
    public function destory($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect()->route('post.index')->with('successMessage', 'Post Successfully Deleted');
    }
}
