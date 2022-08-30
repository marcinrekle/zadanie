@extends('mail::layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('mail.store') }}">
        @csrf
        <label for="sender">Nadawca</label>
        <input type="email" id="sender" name="sender" placeholder="mail@mail.com" required>
        <label for="recipient">Odbiorca</label>
        <input type="email" id="recipient" name="recipient" placeholder="mail@mail.com" required>
        <label for="title">Tytul</label>
        <input type="text" id="title" name="title" placeholder="Tytul" required>
        <label for="title">Treść</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Tresc ...." required></textarea>
        <button type="submit">Wyślij</button>
    </form>
@endsection

