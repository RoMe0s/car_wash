@extends('layouts.master')

@section('content')
    <h2 class="text-center">
       Добавление объекта
    </h2>
    {!! Form::open(['method' => 'POST', 'route' => 'api.object.store', 'id' => 'object-form', 'ajax']) !!}
        @include('object.partials.timeline')
    {!! Form::close() !!}
@endsection

@section('scripts')
    @parent()
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
@endsection