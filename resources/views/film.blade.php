@extends('layouts/app')

@section('title')Фильмы @endsection

@section('main_content')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">


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
    <form class="container" method="post" action="/film/check">
        <div class="text-center">
        <h1>Добавление фильма</h1>
        </div>
        <br>
        @csrf
        <input type="text" name="name" id="name" placeholder="Введите название" class="form-control"><br>
        <div class="form-group">
            <label for="sel1">Укажите акетра</label>
            <select name="actors" class="form-control" id="actors">
                @foreach($actor as $el)
                    <option value="{{$el->name}} {{$el->surname}}">{{$el->name}} {{$el->surname}}</option>
                @endforeach
            </select>
            <label for="sel1">Укажите режисера</label>
            <select name="director" class="form-control" id="director">
                @foreach($director as $el)
                    <option value="{{$el->name}}">{{$el->name}} {{$el->surname}}</option>
                @endforeach
            </select>
            <label for="sel1">Укажите жанр</label>
            <select name="genre" class="form-control" id="genre">
                @foreach($genre as $el)
                    <option value="{{$el->name}}">{{$el->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Добавить фильм</button>
    </form>
    @endif
    <br>
    <form method="post">
        <div class="container text-center">
        <h1>Все фильмы:</h1>
        </div>
        <br>
    @foreach($form_film as $el)
            <div class="container alert alert-dark">
                <h2>{{$el->name}}</h2>
                <br>
                <b> Актеры: {{$el->actors}}</b>
                <br>
                <b>Режисер: {{$el->director}}</b>
                <br>
                <b>Жанр: {{$el->genre}}</b>
                <br>
                <div class="align-content-between">
                    <p>Оценка:</p>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-moon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"/>
                    </svg>
                </div>
                @if($isAdmin)
                <button class="btn btn-danger align-content-center">
                    <a href="/film/delete/{{$el->id}}" class="btn btn-danger">Удалить</a>
                </button>
                    @endif
            </div>

    @endforeach
    </form>
@endsection
