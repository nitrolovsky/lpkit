@extends('layouts.main')
@section('content')
    <div class="container py-5">
        <a href="/pages/create" class="btn btn-primary">Создать страницу</a>
    </div>
    @if (count($pages) > 0)
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    @foreach ($pages as $page)
                        <a href="/pages/{{ $page->id }}">/pages/{{ $page->id }}</a>
                        <a class="btn btn-warning btn-sm" href="/pages/{{ $page->id }}/edit" role="button"><span class="fa fa-fw fa-pencil"></span>&nbsp;Редактировать</a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
