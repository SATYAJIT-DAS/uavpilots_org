<section class="navigation ">
    <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-fixed-top">
        <a class="navbar-brand font-weight-bold" href="{{ route('homepage') }}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navtoggle" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navtoggle">
            <ul class="nav navbar-menu order-1 order-lg-2">
                <li class="nav-item dropdown">
                        <a class="nav-link"  href="{{ route('homepage') }}">
                           Home
                        </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link"  href="{{ route('user.home') }}">
                           Dashboard
                        </a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link"  href="{{ route('login') }}">
                            Sign in
                        </a>
                    </li>
                @if (Route::has('register'))
                    <li class="d-flex align-items-center">
                        <a href="{{ route('register') }}" class="btn w-sm mb-1 btn-rounded btn-outline-success">
                            Register
                        </a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->email }} <span class="caret"></span>
                        </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            <ul class="nav navbar-menu order-1 order-lg-2">
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link px-2" data-toggle="fullscreen" data-plugin="fullscreen">
                    <i data-feather="maximize"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-2" data-toggle="dropdown">
                    <i data-feather="settings"></i>
                    </a>
                    <!-- Setting START-->
                    <div class="dropdown-menu dropdown-menu-center mt-3 w-md animate fadeIn">
                    <div class="setting px-3">
                        <div class="mb-2 text-muted">
                        <strong>Color:</strong>
                        </div>
                        <div class="mb-2">
                        <label class="radio radio-inline ui-check ui-check-md">
                            <input type="radio" name="bg" value="">
                            <i></i>
                        </label>
                        <label class="radio radio-inline ui-check ui-check-color ui-check-md">
                            <input type="radio" name="bg" value="bg-dark">
                            <i class="bg-dark"></i>
                        </label>
                        </div>
                    </div>
                    </div>
                    <!-- Setting END-->
                </li>
            <!-- Navarbar toggle btn -->

        </ul>
        </div>
    </nav>
</section>
