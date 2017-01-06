@extends('templates.default')
@section('stylesheets')
    <link href={{ URL::asset('css/common.css') }} rel="stylesheet">
@endsection

@section('content')

    <p>Здесь будем предлогать компании ввести название и оплатить</p>



@endsection
@section('scripts')
    <script type="application/javascript" src={{ URL::asset('js/common.js') }}></script>
@endsection