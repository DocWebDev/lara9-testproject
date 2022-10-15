<?php

namespace App\Http\Controllers;

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


        // prepared statements with query builder
        // $posts = DB::select('SELECT * FROM posts WHERE id = ?', [1]);
        // or named params
        // $posts = DB::select('SELECT * FROM posts WHERE id = :id', ['id' => 1]);

        // echo "<pre>";
        // print_r($posts);
        // die();

        // $post = DB::delete('DELETE FROM posts WHERE id = ?', [3]);
        // dd($post);

        // chaining & selecting spec. columns
        // $posts = DB::table('posts')
            // ->select('title', 'body')
            // ->where('id', '>', 20)
            // ->where('id', 20)
            // ->where('is_published', true)
            // ->whereBetween('min_to_read', [2, 4])
            // ->whereIn('min_to_read', [2, 4, 6])
            // ->whereNull('excerpt')
            // ->whereNotNull('created_at')
            // ->select('min_to_read')
            // ->distinct() // filters out rows with unique values for 'min_to_read' column
            // ->orderBy('id', 'DESC')
            // ->skip(5)      // useful for custom pagination (skip & take)
            // ->take(10)      // amount of rows that you want to select (perPage)
            // ->inRandomOrder()
            // ->get();

        // instead of ->get()  ->first()  (which sets the limit to 1 implicitly)
        $posts = DB::table('posts')
            // ->where('id', 5)
            // ->first();
            // ->find(5); // replaces the previous where & first
            // ->where('id', 5)
            // ->value('body'); // print out the content of post with id 5
            // ->count();    // with param it shows the row count..or with condition:
            // ->where('id', '>', 5)
            // ->count();
            // ->min('min_to_read');  // just the minimum for that column
            // ->max('min_to_read');
            // ->sum('min_to_read');
            ->avg('min_to_read');


        dd($posts);



        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = DB::insert('INSERT INTO posts (title, excerpt, body, image_path, is_published, min_to_read) VALUES (?, ?, ?, ?, ?, ?)', [
            'Test-Title', 'Test-Excerpt', 'Test-Content', 'Test-Image-Path', true, 1
        ]);
        dd($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
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
}
