<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body id="page-top">
    <div id="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
        </div>
    </div>
    @include('includes.header')
    @yield('content')
    @include('includes.sticky-footer')
    @include('includes.footer')
    @yield('page-script')
</body>

</html>