@extends('layouts.app')
@section('title'){{'Результат поиска'}}@endsection
@include('inc.header-private')
@include('inc.messages')
@section('content')
    <div class="container">
        <form class="form" method="get" action="{{route('search')}}">
            @csrf
            <h2>Поиск пользователей</h2>
            <div class="form-row">
                <input type="text" name="name" class="form-control" placeholder="Введите ФИО" required>
                <button type="submit" class="btn btn-primary">Найти</button>
            </div>
        </form>
    </div>
    @if(isset($users))
        <div class="container">
            <h3>Найденные пользователи</h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Дата рождения</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="/id={{$user->id}}">
                                {{$user->name . ' ' . $user->surname}}
                            </a>
                        </td>
                        @if($user->birthday)
                            <td>{{$user->birthday}}</td>
                        @else
                            <td>Не указана</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
