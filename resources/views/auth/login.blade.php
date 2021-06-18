@extends('layouts.app')
@section('title'){{'Авторизация'}}@endsection
@section('content')
    <div class="container">
        <form class="form-signin" method="POST" action="{{route('user.login')}}">
            @csrf
            <h2>Войти</h2>
            {{-- <div class="alert alert-success" role="alert"></div>--}}
            @error('email')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <input type="text" name="email" class="form-control" placeholder="email" required>
            <input type="password" name="password" class="form-control" placeholder="password" required>
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="/registration" class="btn btn-primary">Зарегистрироваться</a>
        </form>
    </div>
@endsection
