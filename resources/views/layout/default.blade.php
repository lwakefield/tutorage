<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    @include('partials.topbar')
    
    <div class="container">
        @yield('content')
    </div>

	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/vue.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
