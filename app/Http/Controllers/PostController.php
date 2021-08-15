<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $posts= Post::all();

       $posts = Post::orderBy('id', 'DESC')->simplePaginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name'        => 'required',
                'category'    => 'required',
                'description' => 'required|min:5|max:50'
            ]
        );

        $validatedData['status'] = 'enable';

        $post = new Post(); //Creating Data for Post Model class
        $post->create($validatedData); //Creating data under the $post object

        return redirect()->route('post.index')->with('successMessage', 'Post successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //SHOW SINGLE POST
     public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //EDIT SINGLE POST
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate(
            [
                'name'        => 'required',
                'category'    => 'required',
                'description' => 'required|min:5|max:50',
                'satus'       => 'requried'
            ]
        );

        $post->update($validatedData);
        return redirect()->route('post.index', $post->post)->with('successMessage', 'Post Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index', $post->post)->with('successMessage', 'Post Successfully Deleted');

    }
}
