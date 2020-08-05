<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ITTECH Surveys</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" type="text/css" href="{{route('root')}}/assets/css/semantic.css" />
    <link rel="stylesheet" type="text/css" href="{{route('root')}}/assets/css/ittech.css" />
</head>
<body class="@yield('bodyClass', '')">
@yield('content')
<script src="{{route('root')}}/assets/js/ittech.js"></script>
</body>
</html>
