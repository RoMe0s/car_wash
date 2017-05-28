@extends('layouts.master')

@section('content')
    <h2 class="text-center">
        Редактирование объекта
    </h2>
    {!! Form::model($model, ['method' => 'POST', 'route' => array('api.object.update', $model), 'id' => 'object-form', 'ajax']) !!}
        @include('object.partials.timeline')
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    @parent()
@endsection

@section('popups')
    @include('object.modals.service_create')
    @include('object.modals.serivce_remove')
@endsection