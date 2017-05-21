@extends('layouts.master')

@section('content')
<div id="serviceinfo" class="flex-center">

    <div>

        <p>
            Секция описания сервиса | Видео инструкция + тарифные планы Бесплатно - перекидывает на регистрацию |
        </p>

        <hr>

        <button type="button" class="btn btn-outline-primary btn-rounded" data-toggle="modal" data-target="#modallogin">

          login

        </button>

        <a class="btn btn-outline-primary btn-rounded waves-effect" href="registration.html">Registration</a>

    </div>

</div>
@endsection

@section('popups')
    @include('auth.popups.login')
@endsection
