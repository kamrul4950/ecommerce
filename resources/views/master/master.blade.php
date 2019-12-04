<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title','E-Shop')
        </title>

        @include('helper.allcss')
        
    </head>
    <body>
        @include('helper.topnavbar')
        
        @yield('productcontent')
        @yield('content')

        @include('helper.bottomfotter')      
        
        @include('helper.allscript')
    </body>
</html>
