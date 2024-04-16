<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
   
</head>

<body>
    <!--ring div starts here-->
    <a href="/">
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
        </button>   </a> 

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
