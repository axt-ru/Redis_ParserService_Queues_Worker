@extends('layouts.app')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($news)
                            <h2>{{ $news->title }}</h2>
                            @if ($news)
{{--                            @if (!$news['isPrivate'])--}} <!--  Показ новости при аутентификации-->
                                <img src="<?=$news->image ?>" style="width: 200px" alt="image">
                                <br>
                                <p><strong>Автор: </strong> <?=$news->author ?></p>
                                <p><?=$news->description ?></p>
                                <hr>
                            @else
                                Для просмотра новости зарегистрируйтесь
                            @endif
                        @else
                            Такой новости нет с таким id
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
