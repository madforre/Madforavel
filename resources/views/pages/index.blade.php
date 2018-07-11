@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="container">
          <h1>{{ $title }}</h1>
          <img src="/storage/cover_images/bg10.jpg" alt="main.jpg"></img>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, culpa.</p>
          <p>매드포라벨에 오신 여러분을 환영합니다!</p>
          <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login &raquo;</a>
          <a class="btn btn-success btn-lg" href="/register" role="button">Register &raquo;</a></p>
        </div>
    </div>
@endsection

