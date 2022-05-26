@extends('layouts.app')

@section('title')
    @parent Тест 2
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">
                            @yield('title')
                        </h1>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Тест 2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
