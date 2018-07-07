@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <hr>
    <form action="{{route('posts.update', $post->id)}}" method="POST" id="postform" enctype="multipart/form-data" accept-charset="UTF-8">
        @method('put')    
        @csrf    
        <div class="form-group">
            <label for="title">글제목</label> : 
            <input type="text" value="{{$post->title}}" class="form-control" id="title" name="title" placeholder="작성할 글 제목을 입력해주세요.">
        </div>

        <div class="form-group">
            <label for="body">내용</label> :
            <textarea id="article-ckeditor" class="form-control" name="body">{{$post->body}}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <input type="file" name="cover_image">
        </div>
        <button type="submit" class="btn btn-success">작성</button>
    </form>
@endsection