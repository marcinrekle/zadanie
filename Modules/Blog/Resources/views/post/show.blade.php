@extends('blog::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="row">
            {!! $post->content !!}
        </div>
    </div>
@endsection