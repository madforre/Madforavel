@extends('layouts.app')

@section('content')
    <h1><?php echo $title; ?></h1> 
    {{-- 많은 템플릿 엔진들이 허용하지 않으나 라라벨은 php 구문에 변수를
        그대로 쓰는 것을 허용한다. --}}
    <p class="lead">This is the about page</p>
    <img src="https://media1.tenor.com/images/bf2299e20d2fd57d230c6722c9732336/tenor.gif?itemid=3573518" alt="we are groot">
@endsection
