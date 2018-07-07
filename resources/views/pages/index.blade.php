@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="container">
          <h1>{{ $title }}</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, iste.</p>
          <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login &raquo;</a>
          <a class="btn btn-success btn-lg" href="/register" role="button">Register &raquo;</a></p>
        </div>
    </div>
@endsection

