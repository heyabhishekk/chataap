<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
        background: #000;
    }

    .box {
        position: relative;
        width: 417px;
        height: 600px;
        background: #1c1c1c;
        border-radius: 8px;
        overflow: hidden;
    }

    .box::before {
        content: '';
        z-index: 1;
        position: absolute;
        top: -50%;
        left: -50%;
        width: 417px;
        height: 600px;
        transform-origin: bottom right;
        background: linear-gradient(0deg, transparent, #58D797, #58D797);
        animation: animate 6s linear infinite;
    }

    .box::after {
        content: '';
        z-index: 1;
        position: absolute;
        top: -50%;
        left: -50%;
        width: 417px;
        height: 600px;
        transform-origin: bottom right;
        background: linear-gradient(0deg, transparent, #58D797, #58D797);
        animation: animate 6s linear infinite;
        animation-delay: -3s;
    }

    @keyframes animate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    form {
        position: absolute;
        inset: 2px;
        background: #28292d;
        padding: 50px 40px;
        border-radius: 8px;
        z-index: 2;
        display: flex;
        flex-direction: column;
    }

    h2 {
        color: #58D797;
        font-weight: 500;
        text-align: center;
        letter-spacing: 0.1em;
    }

    p {
        color: #58D797;
        font-weight: 500;
        font-size: 12px;
        text-align: center;
        letter-spacing: 0.1em;
    }

    .inputBox {
        position: relative;
        width: 300px;
        margin-top: 35px;
        margin-left: 18px;
    }

    .inputBox input {
        position: relative;
        width: 100%;
        padding: 20px 10px 10px;
        background: transparent;
        outline: none;
        box-shadow: none;
        border: none;
        color: #23242a;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
        z-index: 10;
    }

    .inputBox span {
        position: absolute;
        left: 0;
        padding: 20px 0px 10px;
        pointer-events: none;
        font-size: 1em;
        color: #8f8f8f;
        letter-spacing: 0.05em;
        transition: 0.5s;
    }

    .inputBox input:valid~span,
    .inputBox input:focus~span {
        color: #58D797;
        transform: translateX(0px) translateY(-34px);
        font-size: 0.75em;
    }

    .inputBox i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: #58D797;
        border-radius: 4px;
        overflow: hidden;
        transition: 0.5s;
        pointer-events: none;
        z-index: 9;
    }

    .inputBox input:valid~i,
    .inputBox input:focus~i {
        height: 44px;
    }

    .links {
        margin: 10px 0;
        font-size: 0.75em;
        color: #58d797;
        margin-left: 95%;
        text-decoration: beige;
        display: flex;
        justify-content: space-between;
    }

    .home {
        margin: 10px 0;
        font-size: 0.75em;
        color: #58d797;
        margin-left: 95%;
        text-decoration: beige;
        display: flex;
        justify-content: space-between;
    }

    input[type="submit"] {
        border: none;
        outline: none;
        padding: 11px 25px;
        background: #58D797;
        cursor: pointer;
        border-radius: 4px;
        font-weight: 600;
        width: 100px;
        margin-top: -63px;
        margin-left: 13px;
    }

    input[type="submit"]:active {
        opacity: 0.8;
    }

    .sign {
        font-size: 0.75em;
        color: #8f8f8f;
        text-decoration: beige;
        margin-top: 23px;
        margin-right: 114px;

    }
</style>

<body>
    <div class="box">
        <form method="POST" action="{{ route('registerstore') }}">
            @csrf
            <h2>Register</h2>
            <p>Please fill in this form to create an account.</p>
            <div class="inputBox">
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" id="password" required>
                <span>Password</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                <span>Confirm Password</span>
                <i></i>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p class="sign">Already have an account?</p>
            <a href="{{ route('loginview') }}" class="links">LOGIN</a>
            <a href="{{ route('welcome') }}" class="home">HOME</a>
            <input type="submit" value="Register">
        </form>
    </div>

</body>

</html>
