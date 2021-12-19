<!doctype html>
<html lang="en">
  <head>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>@yield('title')</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>

    <!-- content -->
    @yield('content')

    <div id="dropDownSelect1"></div>
	
    <!--===============================================================================================-->
    <script src="{!! asset('assets/js/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
    <!--===============================================================================================-->
    <script src="{!! asset('assets/js/vendor/animsition/js/animsition.min.js') !!}"></script>
    <!--===============================================================================================-->
    <script src="{!! asset('assets/js/js/main.js') !!}"></script>
        
    </body>
</html>