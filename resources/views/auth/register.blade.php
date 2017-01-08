@extends('templates.auth')

@section('content')




{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">*Login</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">*E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}






                        {{--<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">Phone</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="phone" type="text" class="form-control" name="phone" value="">--}}

                                {{--@if ($errors->has('phone'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('phone') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">*Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">*Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">--}}
                            {{--<label for="company_name" class="col-md-4 control-label">*Company name</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="company_name" type="text" class="form-control" name="company_name" required>--}}
                                {{--@if ($errors->has('company_name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('company_name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">--}}
                            {{--<label for="website" class="col-md-4 control-label">*Your website</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="website" type="text" class="form-control" name="website" required>--}}
                                {{--@if ($errors->has('website'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('website') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}





                        {{--<div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">--}}
                            {{--<label for="lang" class="col-md-4 control-label">*Language</label>--}}
                            {{--<div class="col-md-6" id="lang">--}}
                                {{--<select id="lang_select" name="lang" class="form-control">--}}
                                {{--</select>--}}
                                {{--@if ($errors->has('lang'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('lang') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">--}}
                            {{--<label for="country" class="col-md-4 control-label">*Country</label>--}}
                            {{--<div class="col-md-6" id="country">--}}
                                {{--<select id="country_select" name="country" class="form-control">--}}
                                {{--</select>--}}
                                {{--@if ($errors->has('country'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('country') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
{{--</div>--}}

















<div class="row">
    <div class="col z-depth-4 common-auth">
        <div class="title-auth">
            <h4>Register</h4>

            <div>
                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
            <div>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div>
                @if ($errors->has('phone'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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

            <div>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>

            <div>
                @if ($errors->has('company_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                @endif
            </div>


            <div>
                @if ($errors->has('website'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                @endif
            </div>

        </div>












        <form class="login-form" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}



            <div class="row">
                <div class="input-field{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input  id="name" type="text" name="name" value="{{ old('name') }}" class="validate">
                    <label class="active" for="name">Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate">

                    <label class="active" for="email">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <input id="phone" type="text" class="form-control" name="phone" value="">

                    <label class="active" for="phone">Phone</label>
                </div>
            </div>




            <div class="row">
                <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" name="password" value="{{ old('email') }}" class="validate">

                    <label class="active" for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password-confirm" type="password" value="{{ old('email') }}" name="password_confirmation" class="validate">
                    <label class="active" for="password_confirmation">password_confirmation</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field{{ $errors->has('company_name') ? ' has-error' : '' }}">
                    <input id="company_name" type="text" class="form-control" name="company_name" class="validate">

                    <label class="active" for="company_name">company name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field{{ $errors->has('website') ? ' has-error' : '' }}">
                    <input id="website" type="text" name="website" class="validate">

                    <label class="active" for="company_name">Web site</label>
                </div>
            </div>


            <div class="row">

                <input type="checkbox" id="remember-me" name="remember"/>
                <label for="remember-me">Remember me</label>

            </div>
            <div class="row">
                <div class="button-auth">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <a class="btn btn-link" href="{{ url('/login') }}">
                        Go to login
                    </a>

                </div>
            </div>



        </form>
    </div>
</div>



@endsection




