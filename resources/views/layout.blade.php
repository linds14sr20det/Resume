<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


    </head>

    <body>
        <component is="{{ $vueView }}">
            @yield('content')
        </component>
        <!--Styles and scripts at bottom for faster page load-->
        {{ Html::style('css/app.css') }}
        {{ Html::script('js/app.js') }}
    </body>
</html>
