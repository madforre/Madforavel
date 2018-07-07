@extends('layouts.app')

@section('content')
    <h1><?php echo $title; ?></h1> 
    {{-- 많은 템플릿 엔진들이 허용하지 않으나 라라벨은 php 구문에 변수를
        그대로 쓰는 것을 허용한다. --}}
    <p class="lead">This is the about page</p>
@endsection
