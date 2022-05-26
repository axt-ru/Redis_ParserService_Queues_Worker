@extends('layouts.app')

@section('title', 'О нас')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>О нас</h2>
                    </div>
                </div>
            </div>
        </div>
        <h2 style="text-align: center">Обратная связь</h2>
        <form method="POST" action="{{ route('admin.create') }}" }}>
                @csrf
                <div class="form-group">
                    <label for="newsTitle">Имя пользователя</label>
                    <input type="text" name="name" id="newsTitle" class="form-control" value="{{ old('title') }}">

                    <label for="newsCategory">Ваши комментарии по работе проекта</label>
                    <textarea name="text" id="newsText" class="form-control">{{ old('text') }}</textarea>
                </div>

                <div class="form-group">
                    <input class="btn btn-outline-primary" type="submit" value="Отправить">
                </div>
        </form>

    </div>
@endsection

