@extends('layouts.app')

@section('title', 'Панель администратора')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('categories.edit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="categoryTitle">Наименование категории</label>
{{--                                @if ($errors->has('title'))--}}
{{--                                    <div class="alert alert-danger" role="alert">--}}
{{--                                        @foreach($errors->get('title') as $error)--}}
{{--                                            {{ $error }}<br>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <input type="text" name="title" id="categoryTitle" class="form-control" value="{{ old('title') ?? $categories->title }}">

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="{{__('Добавить')}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
