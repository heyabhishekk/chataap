<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8a9c0784cc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .btn-success {
        margin-left: 146px;
    }

    .btn-warning {
        margin-left: 134px;
        margin-top: 8px;
    }

    .he {
        text-align: center;
        font-family: fantasy;
        font-size: 50px !important;
    }

    .pr {
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }

    a {
        color: #0f1113;
        font-family: math;
    }

    a:focus,
    a:hover {
        color: #eee717;
        text-decoration: none;
    }

    .fa-solid,
    .fas {
        font-weight: 900;
        margin-right: 5px;
    }
</style>

<body>

    <div class="jumbotron text-center">
        <h1 class="he">LET'S CHAT🫵🏻</h1>
        <p class="pr">Welcomes You!</p>
    </div>


    <div class="lgr">
        <button class="btn btn-success"><i class="fa-solid fa-right-to-bracket"></i><a
                href="{{ route('loginview') }}">LOGIN</a></button><br>
        <button class="btn btn-warning"><i class="fa-solid fa-right-to-bracket"></i><a
                href="{{ route('registerview') }}">REGISTER</a></button>
    </div>
</body>

</html>
