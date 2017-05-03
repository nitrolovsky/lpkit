@extends('layouts.main')
@section('content')
    @if (count($leads) > 0)
        <div class="container">
            @foreach ($leads as $lead)
                <div class="row">
                    <div class="card card-block {{ empty($lead->status) ? 'card-outline-danger' : '' }}">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                {{ $lead->id }}
                                <br>
                                {{ $lead->created_at }}
                                <br>
                                {{ $lead->source }}
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                {{ $lead->name }}
                                <br>
                                {{ $lead->email }}
                                <br>
                                {{ $lead->phone }}
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <form method="POST" action="/leads/{{ $lead->id }}" class="form-inline">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <textarea class="form-control form-control-sm status" type="text" name="status" id="{{ $lead->id }}">{{ $lead->status }}</textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    @endif
@endsection
