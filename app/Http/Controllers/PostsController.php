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

        $post = DB::delete('DELETE FROM posts WHERE id = ?', [3]);
        dd($post);

        // echo "<pre>";
        // print_r($posts);
        // die();

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
