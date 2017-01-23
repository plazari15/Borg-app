<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('web/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('web/css/style.css') }}">
    <title>Document</title>
</head>
<body>

<nav class="header" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo"><img class="logo" src="{{ URL::asset('images/borg-logo.jpg') }}"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="#">Como Funciona</a></li>
            <li><a href="#">Contato</a></li>
            <li class="waves-effect waves-light btn btn_login green"><a href="#">CADASTRE-SE</a></li>
            <li class="waves-effect waves-light btn btn_login green"><a href="{{ url('login') }}">LOGIN</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="#">Como Funciona</a></li>
            <li><a href="#">Contato</a></li>
            <li class="waves-effect waves-light btn btn_login green"><a href="#">CADASTRE-SE</a></li>
            <li class="waves-effect waves-light btn btn_login green"><a href="#">LOGIN</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<div class="slider">
    <ul class="slides">
        <li>
            <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
            <div class="caption left-align">
                <h3>Left Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
            <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
    </ul>
</div>

<div class="container">
    <div class="section">
        @yield('content')
    </div>
</div>

<footer class="page-footer header">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright green">
        <div class="container">
            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
    </div>
</footer>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ URL::asset('web/js/materialize.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.slider').slider({full_width: true});
    });
</script>
</html>