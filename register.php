
<?php
//PHP
//-------------------------------------------------------------------------------------------------------------------------//
require ('Classes/User.php');

if(isset($_POST["registerSubmit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type="user";
    $user = new User;
    if($user->createNewUser($username,$password,$type))
    {
        session_start();
        $_SESSION["user"] = $username;
        $_SESSION["type"] = $type;
        setcookie("user",$username,time()+60*60*24*7,"/","/");
        setcookie("type",$type,time()+60*60*24*7,"/","/");
        header('Location: '."index.php");
    }
    else{
        echo "<script>alert(\"Account Creation Failed!\");</script>";
    }
}
?>


<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">POS</h1>

        </div>
        <h3>Register to POS</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" action="" method="post">
            <div class="form-group">
                <input id="username" type="text" name="username" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
            </div>
            <input type="submit" class="btn btn-primary block full-width m-b" name="registerSubmit" value="Register">

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
        </form>
        <p class="m-t"> <small>Infinty Devs &copy; 2019</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
