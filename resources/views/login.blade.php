<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{asset('css/loginPage.css')}}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- CSRF Token позволяет защитить адреса от передачи данных со сторонних сервисов -->
    <title>Страница авторизации</title>
</head>
<body>
<div class="container">
    <form class="form-signin" method="POST" action="{{route('user.login')}}">
        @csrf
        <h2>Войти</h2>
        {{-- <div class="alert alert-success" role="alert"></div>--}}
        @error('email')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror
        <input type="text" name="email" class="form-control" placeholder="email" required>
        <input type="text" name="password" class="form-control" placeholder="password" required>
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="/registration" class="btn btn-primary">Зарегистрироваться</a>
    </form>
</div>
</body>
</html>
