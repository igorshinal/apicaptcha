
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Apicapcha</a>
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav" style="margin-left: 40%">
                <li><a href={{ url('/')}}>Captcha install</a></li>

                <li><a href={{ url('company')}}>For company</a></li>
            </ul>

                    @if (Auth::guest())
                <div class="dropdown  navbar-right" style="margin: 7.5px -15px;">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Sign in/Sign up
                        <span class="caret"></span>
                    </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('/register') }}">Sign up</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/login') }}">Sign in</a></li>
                    </ul>
                </div>
                    @else
                <div class="dropdown  navbar-right" style="margin: 7.5px -15px;">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="">Update profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </ul>
                    </div>
                    @endif
        </div>
    </div>
</nav>




