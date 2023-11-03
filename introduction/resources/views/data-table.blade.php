@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($data) === 0) 
        <div>Пока нет ничего...</div>
    @else
    <h2>Данные в виде таблицы</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Сообщение</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['message'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection