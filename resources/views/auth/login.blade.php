@extends('templates.auth')
@section('stylesheets')
    <link rel="stylesheet" href={{ URL::asset('css/auth.css') }}>
@endsection

@section('content')
    <div class="row valign">
        <div class="col z-depth-4 common-auth">
            <div class="title-auth">
                <h5>Login</h5>
                <div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
            <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input value="{{ old('email') }}" name="email" id="email" type="email"
                               class="validate">
                        <label class="active" for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input name="password" id="password" type="password"
                               class="validate">
                        <label class="active" for="password">Password</label>
                    </div>
                </div>
                <div class="row">

                    <input type="checkbox" id="remember-me" name="remember"/>
                    <label for="remember-me">Remember me</label>

                </div>
                <div class="row">
                    <div class="button-auth">
                        <button type="submit" class="btn btn-primary">
                            LOGIN
                        </button>

                        <a class="btn btn-link" href="{{ url('/register') }}">
                            Registration
                        </a>


                    </div>
                </div>
                <div class="row">
                    <p class="margin medium-small"><a href="{{ url('/password/reset') }}">Forgot password</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
