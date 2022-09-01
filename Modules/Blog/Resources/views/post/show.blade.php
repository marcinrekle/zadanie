@extends('blog::layouts.master')

@section('content')
    <div class="container">
            {!! $post->content !!}
    </div>
@endsection