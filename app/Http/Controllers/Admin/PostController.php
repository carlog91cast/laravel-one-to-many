<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
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
        $posts = Posts::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentData = $request->all();

        // $validateData = $request->validate(
        //     [
        //         'author' => 'required|max:50',
        //         'title' => 'required|unique:posts|max:60000',
        //         'post_image' => 'required|max:50',
        //         'post_content' => 'required|max:60000',
                
        //     ],
        //     [
        //         'title.required' => 'aho, sto titolo ce lo volemo mette, Frà?'
        //     ]
        // );

        $post = new Posts();
        $post->user_id = 121;
        $post->author = $sentData['author'];
        $post->title = $sentData['title'];
        $post->post_image = $sentData['post_image'];
        $post->post_content = $sentData['post_content'];
        $post->post_date = $sentData['post_date'];
        $post->save();

        return redirect()->route('admin.posts.show',compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
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
        $sentData = $request->all();
       
       $post = Posts::findOrFail($id);
       $post->update($sentData);
       return redirect()->route('admin.posts.index', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $post = Posts::findOrFail($id);
        $post->delete();
        // return redirect()->route('admin.posts.index')->with('delete', Posts::all());
        $posts = Posts::all();
        return redirect()->route('admin.posts.index', compact('posts'));
    }
}
