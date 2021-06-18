@extends('layouts.app')
@section('title'){{'Найти человека'}}@endsection
@section('content')
    <div class="container">
        <form action="{{route('search-submit')}}" method="post">
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="surname">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Город</label>
                <input type="text" class="form-control" id="city">
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">День рождения</label>
                <input type="text" class="form-control" id="birthday">
            </div>
            <button type="submit" class="btn btn-primary">Найти</button>
        </form>
    </div>
@endsection
