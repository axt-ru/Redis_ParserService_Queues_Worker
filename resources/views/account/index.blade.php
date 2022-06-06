@extends('layouts.app')


@section('content')
    <h2>Добро пожаловать!</h2>
    <br>
    <a href="{{ route('admin.index') }}"> Перейти на панель администратора </a>

@endsection
