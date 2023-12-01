@extends('layouts.app')

@section('content')
    <h1>Заголовок: {{ $post->title }}</h1>
    <p>Контент: {{ $post->content }}</p>
    <a href="{{ url('/users/'.$user->id.'/posts/'.$post->id.'/edit') }}">Редактировать</a>
    <form action="{{ url('/users/'.$user->id.'/posts/'.$post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
@endsection