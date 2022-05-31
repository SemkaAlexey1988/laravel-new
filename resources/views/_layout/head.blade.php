<head>
    <meta charset="utf-8" />
    <title>{{$title}}</title>
    <!--[if IE]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @auth
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{$description}}"/>
    <meta name="keywords" content="{{$keywords}}">
    @endauth
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</head>
