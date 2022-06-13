@extends('layouts.app')

@section('title', 'Создать ресурс')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                            <form method="POST" action="{{ route('link.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="rssLink">Добавление ссылки на ресурс</label>
                                @if ($errors->has('link'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('link') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="link" id="rssLink" class="form-control" value="{{ old('link') }}"> <br>

                                <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="Добавить ресурс">
{{--                            <input class="btn btn-outline-primary" type="submit" value="@if ($link->id){{__('Изменить')}}@else{{__('Добавить')}}@endif ресурс">--}}
                                </div>
                                @forelse($links as $item)
                                        <h3>{{ $item->link }}</h3>
                                    <form action="{{ route('link.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Удалить
                                        </button>
                                    </form>
                                @empty
                                        <p>Нет ресурсов для парсинга</p>
                                @endforelse
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
