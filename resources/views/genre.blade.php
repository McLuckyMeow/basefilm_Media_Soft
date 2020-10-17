@extends('layouts/app')

@section('title')Жанры @endsection

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
        <form class="container" method="post" action="/genre/check">
            <div class="text-center">
                <h1>Добавление жанр</h1>
                <br>
            </div>
            @csrf
            <input type="name" name="name" id="name" placeholder="Введите название" class="form-control"><br>

            {{--<input type="text" name="film_name" id="film_name" placeholder="Введите фильм" class="form-control"><br>--}}
            <button type="submit" class="btn btn-success">Добавить жанр</button>
        </form>
    @endif
    <br>
    <form method="post">
        <div class="container">
            <h1>Все жанры:</h1>
        </div>
        @foreach($genre as $el)
            <div class="container alert alert-dark">
                <b>{{$el->name}}</b>
                <br>
                @if($isAdmin)
                    <a href="/genre/delete/{{$el->id}}" class="btn btn-danger">Удалить</a>
                @endif
            </div>
        @endforeach
    </form>

@endsection
