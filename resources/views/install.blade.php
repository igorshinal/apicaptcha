@extends('templates.default')
@section('stylesheets')
    <link href={{ URL::asset('css/common.css') }} rel="stylesheet">
@endsection

@section('content')

    <p>Здесь что то на подобии доки по установки капчи</p>



@endsection
@section('scripts')
    <script type="application/javascript" src={{ URL::asset('js/common.js') }}></script>
@endsection