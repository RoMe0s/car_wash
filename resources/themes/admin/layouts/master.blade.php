<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        {!! Meta::render() !!}

        @section('styles')
            @include('partials.styles')
        @show
    </head>
    <body class="hidden-sn white-skin">

        @include('partials.header')

        <div class="container-fluid" style="padding-top: 2rem; margin-bottom: 80px;">

            @yield('content')

        </div>

        @include('partials.footer')

        @section('popups')

        @show

        @section('scripts')
            @include('partials.scripts')
        @show
        
    </body>
</html>
