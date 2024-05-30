<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    @include('inc._head')
    @yield('style')
  </head>

  <body>
    @include('inc._navbar')
      <main id="app">
        <!--@include('inc._messages')-->
        @yield('content')
      </main>
    @include('inc._footer')
    @yield('script')
    
  </body>

</html>


