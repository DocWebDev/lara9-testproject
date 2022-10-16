@extends('layouts.app')

@section('title', 'Posts')


@section('content')
    <h1 class="text-2xl">Blog Posts</h1>
    <div>
        @forelse ($posts as $post)
            {{-- {{ $loop->index + 1 }}. {{ $post->title }} --}}
            {{-- {{ $loop->remaining }}. {{ $post->title }} --}}
            {{-- {{ $loop->count }} --}}
            {{-- {{ $loop->first }}  is it the first el in the array --}}
            {{-- {{ $loop->last }}  is it the last el in the array --}}
            {{-- {{ $loop->parent }} if the loop is inside another loop --}}
            {{ $loop->iteration }}. {{ $post->title }}
            <br>
        @empty
            <p>No posts has been set</p>
        @endforelse
    </div>

    <a href={{ route('posts.show', ['id'=> 1]) }}>Details</a>
@endsection

