@extends('layouts.app')

@section('content')
    <h1>Добавление Поста</h1>
    <form action="{{ url()->current() }}" method="POST">
        @csrf
        <label for="title">Заголовок:</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Заголовок:</label>
        <textarea name="content" id="content" required></textarea>

        <label for="tags">Выберите теги:</label>
        <select name="tags[]" id="tags" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>

        <button type="submit">Добавить</button>
    </form>
@endsection