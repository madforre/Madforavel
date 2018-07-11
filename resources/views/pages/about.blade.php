@extends('layouts.app')

@section('content')
    <h1><?php echo $title; ?></h1> 
    {{-- 많은 템플릿 엔진들이 허용하지 않으나 라라벨은 php 구문에 변수를
        그대로 쓰는 것을 허용한다. --}}
    <p class="lead">This is the about page</p>
    <div class="about"><img src="/storage/images/whales.jpg" alt="whale_about"></div>
    <div class="about_text">
        <br>
        Git-hub : <a href="https://github.com/madforre">github.com/madforre</a><br>
        2018-Concert-Life-Project : <a href="http://madforre.dothome.co.kr/">madforre.dothome.co.kr</a><br>
        Madforavel-AWS : <a href="http://ec2-13-209-49-129.ap-northeast-2.compute.amazonaws.com/">ec2-13-209-49-129.ap-northeast-2.compute.amazonaws.com</a>
    </div>
@endsection
