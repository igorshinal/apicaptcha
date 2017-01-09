<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>apicapcha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/profile.css') }}" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="{{ URL::asset('/js/profile.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<div class="container">
    <div class="row">
        @include('profile.profile-menu')
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="bs-callout bs-callout-danger">
                   {{ $err }}
                    @if ($cid == '0')
                        <h4>У вас нет капчи</h4>
                    <form action="/profile/create" method="post">
                        <input type="submit" value="Создать">
                    </form>
                    @else
                    <input type="text" placeholder="Слово капчи" value="{{ $word }}" id="word"><br><br>
                        Ресайз при новой загрузке!
                        <input type="text" size="3" id="background_width" placeholder="width" value="{{ $background_width }}">
                        <input type="text" size="3" id="background_height" placeholder="height" value="{{ $background_height }}">
                        Бэкграунд капчи<img src="{{ $background }}?<?php echo time(); ?>" id="showbackground"><input type="file" id="background"><br>
                        Ресайз при новой загрузке!
                        <input type="text" size="3" id="logo_width" placeholder="width" value="{{ $logo_width }}">
                        <input type="text" size="3" id="logo_height" placeholder="height" value="{{ $logo_height }}">
                        Логотип<img src="{{ $logo }}?<?php echo time(); ?>" id="showlogo"><input type="file" id="logo"><br><br>
                        <input type="color" id="textcolor" value="#{{ $color }}"><br><br>
                        Шрифт<input type="file" id="font"><br><br>
                        <img src="{{ $draw }}?<?php echo time(); ?>" id="result">
                        <button id="save">Сохранить изменения</button>
                        <div class="status"></div>
                    @endif

                </div>
                </div>
        </div>
    </div>
</div>
</div>
</body>
</html>