<?php
session_start();
session_destroy();
setcookie("username",null,time()-3600,"/");
setcookie("type",null,time()-3600,"/");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>\

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">POS</h1>
        </div>
        <h3>Welcome to POS</h3>
        <p>Perfectly designed Point of Sale.
        </p>
        <p>Login In</p>
        <form class="m-t" role="form" action="login.php" method="post">
            <div class="form-group">
                <input id="username" type="text" name="username" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
            </div>
            <button name="loginSubmit" type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
        </form>
        <p class="m-t"> <small>Infinty Devs &copy; 2019</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php
//PHP
//-------------------------------------------------------------------------------------------------------------------------//
require_once ('Classes/User.php');

if(isset($_POST["loginSubmit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new User;
    if($user->login($username,$password))
    {
        header('Location: '."index.php");
        die();
        echo "Redirect!";
    }
    else{

    }
}
?>