<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    
    .navigation > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    
    .title{
        padding: 0 25px;
        font-size: 84px;
    }

    .content{
        padding: 0 25px;
    }

    footer{
        padding: 0 25px;
        position:fixed;
        left:0px;
        bottom:0px;
        width: 100%;
        background: grey;
        color: white;
    }
    </style>

    <title>Document</title>
</head>
<body>
    <div class="navigation">
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ route('news') }}">Noticias</a>  
        <a href="{{ route('us') }}">Nosotros</a>      
    </div>

    <div class="title">
        @yield('title')
    </div>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        footer
    </footer>
</body>
</html>