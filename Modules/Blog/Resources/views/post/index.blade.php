@extends('blog::layouts.master')

@section('content')
    <div class="container">
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
