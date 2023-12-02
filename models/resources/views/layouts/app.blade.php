<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваше приложение</title>
    <style>
        td, th {
            border: 1px solid black;
            padding: 5px;
        }
        
        .form-control {
            padding: 7px;
            margin: 5px;
        }

        .text-danger {
            color: red;
        }

        .alert-success {
            color: green;
        }

        .btn-primary {
            margin: 15px 0 0 15px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}">Логотип</a>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ url('/users') }}">Пользователи</a></li>
                    <li><a href="{{ url('/tags') }}">Теги</a></li>
                    <li><a href="{{ url('/json/users') }}">JSON Users</a></li>
                    <li><a href="{{ url('/json/posts') }}">JSON Posts</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 Мой Laravel сайт. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>