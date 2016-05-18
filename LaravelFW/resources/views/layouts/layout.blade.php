<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>


        @include('layouts.menu')
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>