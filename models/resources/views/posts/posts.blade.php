@extends('layouts.app')

@section('content')
    <h1>Список постов пользователя</h1>
    <a href="{{ url('/users/'.$user->id.'/posts/create') }}">Добавить новый пост</a>
    <table>
        <tr>
            <th>Название</th>
            <th>Контент</th>
            <th>Действие</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <a href="{{ url('/users/'.$user->id.'/posts/'.$post->id) }}">Просмотр</a>
                    <a href="{{ url('/users/'.$user->id.'/posts/'.$post->id.'/edit') }}">Редактировать</a>
                    <form action="{{ url('/users/'.$user->id.'/posts/'.$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection