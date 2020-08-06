<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ITTECH Surveys</title>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/semantic.css" />
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/ittech.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <base href="{{route('base')}}">
</head>
<body class="@yield('bodyClass', '')">
<div id="app">
@yield('pagecontent')
</div>
<script src="{{url('/')}}/assets/js/ittech.js"></script>
</body>
</html>
