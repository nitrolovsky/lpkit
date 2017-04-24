@extends('layouts.main')
@section('content')
    @if (count($leads) > 0)
        <div class="container">
            @foreach ($leads as $lead)
                <div class="row">
                    <div class="card card-block">
                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Идентификатор
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                {{ $lead->id }}
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Дата и время создания
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                {{ $lead->created_at }}
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Источник
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                {{ $lead->source }}
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Имя
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                {{ $lead->name }}
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Email
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                {{ $lead->email }}
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Телефон
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                {{ $lead->phone }}
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-xl-right text-lg-right text-md-right text-left">
                                Статус
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                <form method="POST" action="/leads/{{ $lead->id }}" class="form-inline">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <textarea class="form-control form-control-sm status" type="text" name="status" id="{{ $lead->id }}">{{ $lead->status }}</textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
