@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Форма</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="/submit-form">
        @csrf
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea class="form-control" id="message" name="message" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection