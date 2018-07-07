@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <hr>
    <form action="/posts" method="POST" id="postform" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="form-group">
              <label for="title">제목</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="작성할 글 제목을 입력해주세요.">
            </div>
            <hr>
            <div class="form-group">
              <label for="body">내용</label>
              <textarea id="article-ckeditor" name="body" class="form-control" placeholder="작성할 글 내용을 입력해주세요."></textarea>
            </div>
            <hr>
            <div class="form-group">
              <input type="file" name="cover_image">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">작성</button>
    </form>
@endsection