<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get() and all() are almost the same
        // except that get allows chaining and it needs
        // to be the last command like with querybuilders get()

        // $posts = Post::all();
        // $posts = Post::get();
        // $posts = Post::orderBy('id', 'desc')
        //     ->take(10)
        //     ->get();

        // $posts = Post::where('min_to_read', 2)->get();
        // $posts = Post::where('min_to_read', '!=', 2)->get();

        // $posts = Post::get()->count();
        // $posts = Post::sum('min_to_read');
        // $posts = Post::avg('min_to_read');

        // $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('posts.index', [
            'posts'=> Post::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $post = DB::insert('INSERT INTO posts (title, excerpt, body, image_path, is_published, min_to_read) VALUES (?, ?, ?, ?, ?, ?)', [
        //     'Test-Title', 'Test-Excerpt', 'Test-Content', 'Test-Image-Path', true, 1
        // ]);
        // dd($post);
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
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'],
            'min_to_read' => 'min:0|max:60',
        ]);

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published == 'on',
            'min_to_read' => $request->min_to_read
        ]);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if there are no matching results findOrFail will throw an Error
        // so lets say: the id in the route is greater than the max id in the
        // posts, the User gets an 404 page back (instead of getting "null" back with
        // the find method, which is printed on a blank screen)

        // $post = Post::find($id);
        // $post = Post::findOrFail($id);

        return view('posts.show', [
            // 'post' => $post
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::update('UPDATE posts SET body = ? WHERE id = ?', [
            'Test-Content', $id
        ]);
        dd($post);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeImage($request) {

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        // copy img to:
        return $request->image->move(public_path('images'), $newImageName);
    }
}
