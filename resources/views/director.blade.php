@extends('layouts/app')

@section('title')Режесеры @endsection

@section('main_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all(0) as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @if($isAdmin)
        <form class="container" method="post" action="/director/check">
            <div class="text-center">
                <h1>Добавление Режесера</h1>
                <br>
            </div>
            @csrf
            <input type="name" name="name" id="name" placeholder="Введите имя" class="form-control"><br>
            <input type="text" name="surname" id="surname" placeholder="Введите фамилию" class="form-control"><br>
            <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Введите дату рождения" class="form-control"><br>
            <input type="text" name="film_name" id="film_name" placeholder="Укажите фильм(ы)" class="form-control"><br>
{{--            <div class="form-group">
                <label for="sel1">Укажите фильм(ы)</label>
                <select name="film_name" class="form-control" id="film_name">
                    @foreach($form_film as $el)
                        <option value="{{$el->name}}">{{$el->name}}</option>
                    @endforeach
                </select>
            </div>--}}
            <button type="submit" class="btn btn-success">Добавить Актера</button>
        </form>
    @endif
    <br>
    <form method="post">
        <div class="container text-center">
            <h1>Все Режисеры:</h1>
        </div>
        <br>
        @foreach($director as $el)
            <div class="container alert alert-dark">
                <b>{{$el->name}}</b>
                <b>{{$el->surname}}</b>
                <br>
                <b>Дата рождения: {{date ('Y.m.d', strtotime($el->date_of_birth))}}</b>
                <br>
                <b>Фильмы: {{$el->film_name}}</b>
                <br>
                @if($isAdmin)
                    <a href="/director/delete/{{$el->id}}" class="btn btn-danger">Удалить</a>
                @endif
            </div>
        @endforeach
    </form>
@endsection
