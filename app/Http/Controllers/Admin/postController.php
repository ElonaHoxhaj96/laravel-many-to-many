<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Functions\Helper;
use App\Http\Requests\PostRequest;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
       return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $new_post = new Post();

        $data['slug'] = Helper::generateSlug($data['title'], Post::class);
        $new_post->fill($data);
        $new_post->save();

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::find($id);       
        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $posts = Post::find($id);
        return view('admin.posts.edit', compact('posts', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $data = $request->all();
        // dd($data);
        $posts = Post::find($id);

          //se il titolo cambia cambia lo slug altimenti mantengo il solito 
          if($data['title'] == $posts->title){
            $data['slug'] = $posts->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['title'], Post::class);
        }

        $posts->update($data);
        return redirect()->route('admin.posts.show', $posts);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post-> delete();
        return redirect()->route('admin.posts.index')->with('delete', 'Il post '. $post->title . 'è stato eliminato corettamente');
    }
}
