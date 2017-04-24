@extends('layouts.main')
@section('content')
    @if (count($leads) > 0)
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Дата создания
                            </th>
                            <th>
                                Источник
                            </th>
                            <th>
                                Имя
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Телефон
                            </th>
                            <th>
                                Статус
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leads as $lead)
                            <tr>
                                <td>
                                    {{ $lead->id }}
                                </td>
                                <td>
                                    {{ $lead->created_at }}
                                </td>
                                <td>
                                    {{ $lead->source }}
                                </td>
                                <td>
                                    {{ $lead->name }}
                                </td>
                                <td>
                                     {{ $lead->email }}
                                </td>
                                <td>
                                     {{ $lead->phone }}
                                </td>
                                <td>
                                    <form method="POST" action="/leads/{{ $lead->id }}" class="form-inline">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <textarea class="form-control form-control-sm status" type="text" name="status" id="{{ $lead->id }}">{{ $lead->status }}</textarea>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    @endif
@endsection
