@extends('templates.auth')
@section('stylesheets')
    <link rel="stylesheet" href={{ URL::asset('css/auth.css') }}>
    @endsection

<!-- Main Content -->
@section('content')

        <div class="row valign">
            <div class="col z-depth-4 common-auth">
                <div class="title-auth">
                    <h5>Reset password</h5>
                    <div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>



                <form class="login-form" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}


                    <div class="row">
                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input value="{{ old('email') }}" name="email" id="email" type="email"
                                   class="validate">
                            <label class="active" for="email">Email</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="button-auth">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
