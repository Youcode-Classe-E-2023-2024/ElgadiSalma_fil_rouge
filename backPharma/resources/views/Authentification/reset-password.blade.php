<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
    <style>
         /* author: https://codepen.io/Gogh/pen/gOqVqBx
        Vincent Van Goggles */
        @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Quicksand", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #EFEFEF;
            /* Couleur de fond en mode clair */
            width: 100%;
            overflow: hidden;
        }

        .ring {
            position: relative;
            width: 500px;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ring i {
            position: absolute;
            inset: 0;
            border: 2px solid #000000;
            transition: 0.5s;
        }

        .ring i:nth-child(1) {
            border-radius: 40% 40%;
            animation: animate 5s linear infinite;
        }

        .ring i:nth-child(2) {
            border-radius: 40% 40%;
            animation: animate 10s linear infinite;
        }

        .ring i:nth-child(3) {
            border-radius: 40% 40%;
            animation: animate 15s linear infinite;
        }

        .ring:hover i {
            border: 6px solid var(--clr);
            filter: drop-shadow(0 0 20px var(--clr));
        }

        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes animate2 {
            0% {
                transform: rotate(360deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .login {
            width: 300px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            background: #EFEFEF;
            /* Couleur de fond en mode clair */
        }

        .login h2 {
            font-size: 2em;
            color: #000;
            /* Couleur du texte en mode clair */
        }

        .login .inputBx {
            position: relative;
            width: 350px;
        }

        .login .inputBx input {
            position: relative;
            width: 100%;
            padding: 12px 20px;
            background: transparent;
            border: 2px solid #000;
            /* Couleur de la bordure en mode clair */
            border-radius: 40px;
            font-size: 1.2em;
            color: #000;
            /* Couleur du texte en mode clair */
            box-shadow: none;
            outline: none;
        }

        .login .inputBx input[type="submit"] {
            width: 100%;
            background: #0078ff;
            background: linear-gradient(45deg, #001524, #C5CAB8);
            border: none;
            cursor: pointer;
        }

        .login .inputBx input::placeholder {
            color: rgba(0, 0, 0, 0.75);
            /* Couleur du placeholder en mode clair */
        }

        .login .links {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10 20px;
        }

        .login .links a {
            color: #000;
            /* Couleur du texte en mode clair */
            text-decoration: none;
        }

        /* input style  */
        .inputGroup {
            font-family: 'Segoe UI', sans-serif;
            margin: 1em 0 1em 0;
            max-width: 100%;
            position: relative;
        }

        .inputGroup input {
            font-size: 100%;
            padding: 0.8em;
            outline: none;
            border: 2px solid rgb(200, 200, 200);
            background-color: transparent;
            border-radius: 20px;
            width: 100%;
        }

        .inputGroup label {
            font-size: 100%;
            position: absolute;
            left: 0;
            padding: 0.8em;
            margin-left: 0.5em;
            pointer-events: none;
            transition: all 0.3s ease;
            color: rgb(100, 100, 100);
        }

        .inputGroup :is(input:focus, input:valid)~label {
            transform: translateY(-50%) scale(.9);
            margin: 0em;
            margin-left: 1.3em;
            padding: 0.4em;
            background-color: #e8e8e8;
        }

        .inputGroup :is(input:focus, input:valid) {
            border-color: rgb(150, 150, 200);
        }

        /* button go back style  */
        .animated-button {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 16px 36px;
            border: 4px solid;
            border-color: transparent;
            font-size: 16px;
            /* background-color: ; */
            border-radius: 100px;
            font-weight: 600;
            color: #1f387e;
            box-shadow: 0 0 0 2px #ffffff;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .animated-button svg {
            position: absolute;
            width: 24px;
            fill: #1f387e;
            z-index: 9;
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .animated-button .arr-1 {
            right: 16px;
        }

        .animated-button .arr-2 {
            left: -25%;
        }

        .animated-button .circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            background-color: #c5e5e4;
            border-radius: 50%;
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .animated-button .text {
            position: relative;
            z-index: 1;
            transform: translateX(-12px);
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .animated-button:hover {
            box-shadow: 0 0 0 12px transparent;
            color: #212121;
            border-radius: 12px;
        }

        .animated-button:hover .arr-1 {
            right: -25%;
        }

        .animated-button:hover .arr-2 {
            left: 16px;
        }

        .animated-button:hover .text {
            transform: translateX(12px);
        }

        .animated-button:hover svg {
            fill: #1f387e;
        }

        .animated-button:active {
            scale: 0.95;
            box-shadow: 0 0 0 4px greenyellow;
        }

        .animated-button:hover .circle {
            width: 220px;
            height: 220px;
            opacity: 1;
        }



        /* checkbox */
        /* Hide the default checkbox */
        .container input {
            display: none;
        }
        
        .container {
            display: flex;
            padding-right: 10px;
            position: relative;
            cursor: pointer;
            font-size: 15px;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }
        
        .checkmark {
            position: relative;
            top: 0;
            left: 0;
            height: 1.3em;
            width: 1.3em;
            background-color: rgb(255, 255, 255);
            border-radius: 0.3em;
            transition: all 0.25s;
            --spread: 50px;
        }
        
        .container input:checked ~ .checkmark {
            background-color: #000000;
            box-shadow: -10px -10px var(--spread) 0px rgb(100, 139, 95),
            0 -10px var(--spread) 0px rgb(121, 125, 96),
            10px -10px var(--spread) 0px rgb(53, 88, 77),
            10px 0 var(--spread) 0px rgb(45, 87, 89),
            10px 10px var(--spread) 0px rgb(152, 144, 169),
            0 10px var(--spread) 0px rgb(79, 177, 188),
            -10px 10px var(--spread) 0px rgb(161, 161, 189);
        }
        
        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            transform: rotate(0deg);
            border: 0.1em solid rgba(0, 0, 0, 0.863);
            left: 0;
            top: 0;
            width: 1.1em;
            height: 1.1em;
            border-radius: 0.25em;
            transition: all 0.25s, border-width 0.1s;
        }
        
        /* Show the checkmark when checked */
        .container input:checked ~ .checkmark:after {
            left: 0.45em;
            top: 0.25em;
            width: 0.25em;
            height: 0.5em;
            border-color: rgba(238, 238, 238, 0) white white rgba(89, 140, 145, 0);
            border-width: 0 0.15em 0.15em 0;
            border-radius: 0em;
            transform: rotate(45deg);
        }

        .container span{
            padding-left: 5px;
        }
        
    </style>
   
</head>

<body>
    <!--ring div starts here-->
    <a href="/login">
        <button class="animated-button">
            <span class="text">G O <span style="margin-left: 5px; margin-right:5px;"> | </span> B A C K </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24" transform="scale(-1, 1)">
                <path
                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                </path>
            </svg>
            
            <span class="circle"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24" transform="scale(-1, 1)">
                <path
                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                </path>
            </svg>
        </button>   
    </a> 

    <div class="ring">
        <i style="--clr:#15616D;"></i>
        <i style="--clr:#8AA79F;"></i>
        <i style="--clr:#C5CAB8;"></i>
        <div class="login">
            <h2 style="font-weight:bolder">Reset ur Password</h2>
            <h3 style="text-align: center">Enter ur new password</h3>
            <form action="{{ route('password.reset',  $token ) }}" method="POST">
                @csrf
                <div class="inputBx">
                    @error('password')
                        <span style="color: red; padding-left :10px">{{ $message }}</span>
                    @enderror
                    <div class="inputGroup">
                        <input autocomplete="off" name="password" required="" type="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="inputGroup">
                        <input autocomplete="off" name="confirmPassword" required="" type="password">
                        <label for="password">Confirm Password</label>
                    </div>
                </div>
                <div class="inputBx">
                    <input type="submit" value="Reset">
                </div>
            </form>
            <div class="links">
            </div>
        </div>
    </div>
    <!--ring div ends here-->
</body>

</html>
