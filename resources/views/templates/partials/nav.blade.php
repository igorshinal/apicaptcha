
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Apicapcha</a>
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav" style="margin-left: 40%">
                <li><a href={{ url('install')}}>Captcha install</a></li>

                <li><a href={{ url('company')}}>For company</a></li>
            </ul>

            <div class="dropdown  navbar-right" style="margin: 7.5px -15px;">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Register
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">


                    @if (Auth::check())
                        <li><a href="">Update profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="">Sign out</a></li>
                    @else
                        <li><a href="">Sign up</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="">Sign in</a></li>
                    @endif

                </ul>

            </div>
        </div>
    </div>
</nav>




