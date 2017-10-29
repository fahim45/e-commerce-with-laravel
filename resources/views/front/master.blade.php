<!DOCTYPE HTML>
<html>
    @include('front.includes.head')
<body>
    @include('front.includes.header-top')
    @include('front.includes.header-bottom')
    @include('front.includes.navbar')

    @yield('body')

    @include('front.includes.footer')
</body>
</html>