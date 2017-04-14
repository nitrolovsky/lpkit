@extends('layouts.main')
@section('content')
    <div class="container py-5">
        <a href="/pages/create" class="btn btn-primary">Создать страницу</a>
        <a href="/users/logout" class="btn btn-secondary">Выйти</a>
    </div>
    @if (count($pages) > 0)
        <div class="container pb-5">
            @foreach ($pages as $page)
                <div class="row py-2">
                    <div class="col-xl-3">
                        <a href="/pages/{{ $page->id }}" target="_blank">/pages/{{ $page->id }}</a>
                    </div>
                    <div class="col-xl-3">
                        <a class="btn btn-warning btn-sm" href="/pages/{{ $page->id }}/edit" role="button" target="_blank"><span class="fa fa-fw fa-pencil"></span>&nbsp;Редактировать</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
