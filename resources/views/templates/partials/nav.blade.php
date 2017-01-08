<nav>
    <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>ApiCapcha</a>
    @if (Auth::guest())
        <div class="right">
            <a href="{{ url('/login') }}" class="waves-effect waves-light btn btn-padding"><i
                        class="material-icons left">input</i>Войти</a>
        </div>
    @else
        <div class="right">
            <a class="dropdown-btn btn btn waves-effect waves-light btn-padding">Account</a>
            <div class="row">
                <div class="content">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <img class="responsive-img"
                                 src="{{ URL::asset('images/emotsija-jumor-korporatsija-monstrov-kartinka-Favim.ru-3407447.jpg') }}">
                        </div>
                        <div class="row wrap-email">
                            <i class="material-icons inline">email</i>
                            <span class="email">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="waves-effect waves-light btn">logout</a>
                            <a href="{{ url('/profile') }}" class="waves-effect waves-light btn">profile</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</nav>






















