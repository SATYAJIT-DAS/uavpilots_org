
@include('layouts.global_layout.header')
@if (!Route::is('admin.login'))
   @include('layouts.admin.sidebar')
@endif
@yield('content')
@include('layouts.global_layout.footer')
