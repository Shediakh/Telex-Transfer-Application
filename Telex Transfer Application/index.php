<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="image-wrapper">
        <img src="../images/logo-1.png"><br><br>
            <p class="bold">Welcome to Burgan Bank's Telext Transfer Application</p>
            <p class="bold">Developed by: Hassan El Shediak</p>
            <div class="login-wrapper">
            <!-- <p class="bold-text">Login</p> -->
            <form action="backEnd/login.php" method="POST" id="login-form">
                <input class="input-field" type="text" name="username" id="username" class="text-field" placeholder="Username">
                <br> <br>
                <input class="input-field" type="password" name="password" id="password" class="text-field" placeholder="Password">
                <br>
                <br>
                <input class="submit-button" type="button" value="Log In" onclick="login()" id="login-button" class="submit-button" >
                <br>
                <br>
        </div>        
        <br>     <a class="login-signup" href="pages/signup.html">Sign Up</a>
        </div>
        
    <script>
        function login() {
            form = document.getElementById("login-form");
            form.submit();
        }
    </script>
</body>
</html>