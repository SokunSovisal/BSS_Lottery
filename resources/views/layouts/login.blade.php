<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
      <!-- Page content -->
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>

  <!-- Scripts -->
  <script src="{{ asset('js/js.cookie.js') }}"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  @yield('js')

</body>
</html>
