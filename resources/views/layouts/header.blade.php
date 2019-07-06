<header class="header-2">
    <div class="headerbox">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col col-xl-2">
                    <div class="logo">
                        <a href="{{ route('home') }}" title="Return Home">
                            <img src="{{ asset('assets/img/logo2.png') }}" alt="Logo" class="logo_img">
                        </a>
                    </div>
                </div>

                <div class="col col-xl-10">
                    <nav class="mainmenu">
                        <div class="container">
                            <ul class="sf-menu" id="menu">
                                <li>
                                    <a href="{{ route('home') }}">Home <i class="fa fa-home fa-lg ml-1"></i></a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}">About Us <i class="fa fa-users ml-1"></i></a>
                                </li>

                                @if(auth()->check())
                                    <li class="current">
                                        <a href="#">{{ auth()->user()->username }} <i class="fa fa-user ml-1"></i></a>
                                        <ul class="sub-current">
                                            <li>
                                                <a href="{{ route('profile') }}">Profile <i class="fa fa-pencil ml-1"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">Logout <i class="fa fa-sign-out ml-1"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('sign-up') }}">Sign Up <i class="fa fa-user-plus ml-1"></i></a>
                                    </li>

                                    <li>
                                        <a href="{{ route('sign-in') }}">Sign In <i class="fa fa-sign-in fa-lg ml-1"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>

                    <a class="mobile-nav" href="#mobile-nav"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>