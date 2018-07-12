@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="container">
          <h1>{{ $title }}</h1>
          <img src="/storage/cover_images/bg18.jpg" alt="main.jpg"></img>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, culpa.</p>
          <p>매드포라벨에 오신 여러분을 환영합니다!</p>
          <p>테스트 계정이 제공중입니다! ID : test4u@gmail.com / PW : test4u로 로그인 가능합니다!</p>
          <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login &raquo;</a>
          <a class="btn btn-success btn-lg" href="/register" role="button">Register &raquo;</a></p>
        </div>
    </div>
@endsection