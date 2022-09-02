@extends('blog::layouts.master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="row">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="row">
            <a class="p-4" href="{{ route('post.create') }}">Dodaj post</a>
        </div>
        <div class="row">
            <div class="col-md-7 offset-3 mt-4">
                <table>
                    <tr>
                        <th>L.p</th>
                        <th>Title</th>
                        <th>Url</th>
                    </tr>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td><a href="{{ route('post.show',$item->url) }}">{{ $item->url }}</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
