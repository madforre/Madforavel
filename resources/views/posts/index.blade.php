@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <div class="posts_wrap">
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="posts">
            <div class="card post light" style="width: 18rem;">
                <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <small>{{$post->created_at}}</small>
                    <p><small>{{$post->user->name}}</small></p>
                    {{-- 모델간 관계를 정의해줬다면 $post->user->name도 가능하다. --}}
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-secondary">글읽기</a>
                </div>
            </div>
        </div>              
        @endforeach
        <div class="page">{{$posts->links()}}</div>
    @else
        <p>No posts found</p>
    @endif
    </div>
@endsection