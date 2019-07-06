<div id="mobile-nav">
    <ul>
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-home fa-lg mr-1"></i> Home</a>
        </li>

        <li>
            <a href="{{ route('about-us') }}"><i class="fa fa-users mr-1"></i> About Us</a>
        </li>



        @if(auth()->check())
            <li>
                <a href="#"><i class="fa fa-user mr-1"></i> {{ auth()->user()->username }}</a>
                <ul class="sub-current">
                    <li>
                        <a href="#"><i class="fa fa-pencil mr-1"></i> Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"><i class="fa fa-sign-out mr-1"></i> Logout</a>
                    </li>
                </ul>
            </li>
        @else
            <li>
                <a href="{{ route('sign-up') }}"><i class="fa fa-user-plus mr-1"></i> Sign Up</a>
            </li>

            <li>
                <a href="{{ route('sign-in') }}"><i class="fa fa-sign-in fa-lg mr-1"></i> Sign In</a>
            </li>
        @endif
    </ul>
</div>