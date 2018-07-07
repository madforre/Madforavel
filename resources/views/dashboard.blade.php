@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">내가 작성한 글 관리</div>

                <div class="card-body">
                    <p>회원님이 작성하신 포스팅 목록입니다.</p>
                    @if(count($posts) > 0)
                    <table class="table">
                        <tr>
                            <th>제목</th>
                            <th class="right_side">수정하기</th>
                            <th>삭제하기</th>
                        </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="right_side btn btn-outline-info">글수정</a></td>
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger pull-right">글삭제</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
