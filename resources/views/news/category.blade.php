@extends('layouts.app')

@section('title')
    @parent Категория
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Новости категории {{ $category }}</h1>
                        @dd($news)
                        @forelse($news as $item)
                            <a href="{{ route('news.show', $news ->id) }}"> {{ $news->title }}</a><br>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
