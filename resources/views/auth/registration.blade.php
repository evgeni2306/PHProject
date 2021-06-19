@extends('layouts.app')
@section('title'){{'Регистрация'}}@endsection
@section('content')
    <div class="container">
        <form class="form-signin" method="POST" action="{{route('user.registration')}}">
            @csrf
            <h2>Регистрация</h2>
            {{--      <div class="alert alert-success" role="alert"></div> --}}
            @error('email')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <input type="text" name="name" class="form-control" placeholder="Имя" required>
            <input type="text" name="surname" class="form-control" placeholder="Фамилия" required>
            <input type="text" name="email" class="form-control" placeholder="e-mail" required>
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <a href="/login" class="btn btn-primary">Авторизироваться</a>
        </form>
    </div>
@endsection
