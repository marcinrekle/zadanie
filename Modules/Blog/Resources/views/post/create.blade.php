@extends('blog::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-3 mt-4">
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tytuł</label>
                            <input type="text" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="content">Treść</label>
                            <textarea class="ckeditor form-control" name="content" id="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="url">Adres strony</label>
                            <input type="text" name="url" id="url">
                        </div>
                        <div class="form-group">
                            <button type="submit">Dodaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
