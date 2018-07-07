@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <hr>
    <div class="timeline">
        <p>Written on {{$post->created_at}}</p>
    </div>
    <hr>
    <div class="post_body">
        <img class="post_img" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
    </div>
    <div class="post_bottom">
        {!!$post->body!!}
    </div>    
    <hr>
    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
    <a href="/posts" class="btn btn-secondary">게시판홈</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        @method('delete')
        @csrf
        <button type="submit" class="right_side btn btn-danger pull-right">글삭제</button>
        <a href="/posts/{{$post->id}}/edit" class="right_side btn btn-info">글수정</a>
    </form>
        @endif
    <hr>
    @endif
@endsection 

