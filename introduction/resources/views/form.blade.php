@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Форма</h2>
    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form method="POST" action="/submit-form">
        @csrf
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email"  value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea class="form-control" id="message" name="message" placeholder="Message">{{ old('message') }}</textarea>
            @if ($errors->has('message'))
                <span class="text-danger">{{ $errors->first('message') }}</span>
            @endif
        </div>
        <button type="submit" class="btn-primary">Отправить</button>
    </form>
</div>
@endsection