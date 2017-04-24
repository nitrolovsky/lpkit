@extends('layouts.main')
@section('content')
    @if (count($leads) > 0)
        <div class="container py-5">
            @foreach ($leads as $lead)
                <div class="row py-2">

                </div>
            @endforeach
        </div>
    @endif
@endsection
