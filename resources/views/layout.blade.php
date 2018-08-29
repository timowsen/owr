<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>OWR</title>
    <!--link to css directly -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  </head>
    <body>
            @yield('content')            

    </body>
   
        @yield('timeout')

        @include('datafooter')

        @include('footer')
</html>