@include('layouts.global_layout.header')
@if(!Request::is('/'))
    @include('layouts.navigation.frontendnavbar')
@endif

@yield('content')
{{-- @include('layouts.navigation.frontendfooter') --}}
@include('layouts.global_layout.footer')
