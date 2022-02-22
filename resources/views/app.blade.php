<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ruby React</title>
    <!-- Styles -->
    <link href="{{ asset('css/oneUI/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/oneUI/oneui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div id="app"></div>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{asset('js/oneUi/core/jquery.min.js')}}"></script>
<script src="{{asset('js/oneUi/app.js')}}"></script>

{{--<script src="{{asset('js/oneUi/core/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('js/oneUi/core/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('js/oneUi/core/jquery.scrollLock.min.js')}}"></script>
<script src="{{asset('js/oneUi/core/jquery.appear.min.js')}}"></script>
<script src="{{asset('js/oneUi/core/jquery.countTo.min.js')}}"></script>
<script src="{{asset('js/oneUi/core/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('js/oneUi/core/js.cookie.min.js')}}"></script>

</body>
</html>