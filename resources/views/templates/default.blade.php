<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>apicapcha</title>
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.cookie.js') }}"></script>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href={{ URL::asset('css/style.css') }}>
<script>
    if (!$.cookie('spinner')) {
        document.write('<link rel="stylesheet" href={{ URL::asset('css/preloader.css') }}>');
        $.cookie('spinner', '1', {
            expires: 1,
            path: '/',
        });
    }
</script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('stylesheets')

</head>
<body>
@include('templates.partials.spinner')
@include('templates.partials.nav')
<div class="common-wrap">
    <div class="container">
        @yield('content')
    </div>
</div>
{{--@include('templates.partials.footer')--}}
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<script type="application/javascript" src={{ URL::asset('js/common.js') }}></script>

@yield('scripts')
</body>
</html>