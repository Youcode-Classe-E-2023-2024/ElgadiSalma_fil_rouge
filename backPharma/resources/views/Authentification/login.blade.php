<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            width: 100%;
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
            padding: 0 20px;
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

        /* button login style  */
        
    </style>
</head>

<body>
    <!--ring div starts here-->
    <div class="ring">
        <i style="--clr:#15616D;"></i>
        <i style="--clr:#8AA79F;"></i>
        <i style="--clr:#C5CAB8;"></i>
        <div class="login">
            <h2>Login</h2>
            <div class="inputBx">
                <div class="inputGroup">
                    <input autocomplete="off" required="" type="text">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="inputBx">
                <div class="inputGroup">
                    <input autocomplete="off" required="" type="password">
                    <label for="name">Password</label>
                </div>
            </div>
            <div class="inputBx">
                <input type="submit" value="Sign in">
            </div>
            <div class="links">
                <a href="/forgot-password">Forgot Password ?</a>
            </div>
        </div>
    </div>
    <!--ring div ends here-->
</body>

</html>
