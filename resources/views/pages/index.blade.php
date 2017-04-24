@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="/pages/create" class="btn btn-primary">Создать страницу</a>
    </div>
    @if (count($pages) > 0)
        <div class="container py-5">
            @foreach ($pages as $page)
                <div class="row py-2">
                    <div class="col-xl-3">
                        <a href="/pages/{{ $page->id }}" target="_blank">/pages/{{ $page->id }}</a>
                    </div>
                    <div class="col-xl-3">
                        <a class="btn btn-warning btn-sm" href="/pages/{{ $page->id }}/edit" role="button" target="_blank"><span class="fa fa-fw fa-pencil"></span>&nbsp;Редактировать</a>
                    </div>
                    @if ($page->subdomain)
                        <div class="col-xl-3">
                            <a href="http://{{ $page->subdomain }}.nejron.com" target="_blank">{{ $page->subdomain }}.nejron.com</a>
                        </div>
                    @endif
                    @if ($page->domain)
                        <div class="col-xl-3">
                            <a href="http://{{ $page->domain }}" target="_blank">{{ $page->domain }}</a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection
