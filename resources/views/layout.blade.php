<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nucleic Games</title>
    </head>

    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" v-link="{ path: '/'}">Nucleic Games</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a v-link="{ path: '/about'}">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BrowserGames <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a v-link="{ path: '/flappyBird'}">HTML5 Flappy Bird</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!--Load Page Specific JS dynamically!! -->
    <router-view transition="fade" transition-mode="out-in"></router-view>

    <div class="footer container">
        <p>&copy; 2016 Nucleic Games, Inc.</p>
    </div>
    </body>
    {{ Html::style('css/app.css') }}
    {{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') }}
    {{ Html::script('js/app.js') }}
</html>
