<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        @stack('meta')

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/notifius-icon.png">
    
    </head>
    <body class="bg-black text-purple-700">
        @yield('body')
        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    </body>
</html>