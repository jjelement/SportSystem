<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="layout">
        @include('layouts.header')
        @include('layouts.mobileHeader')

        @if(request()->route()->getName() == 'home')
            @include('layouts.slide')
        @endif

        <section class="content-info">
            @yield('content')
        </section>

        @include('layouts.footer')
    </div>

    @include('layouts.javascript')
</body>
</html>
