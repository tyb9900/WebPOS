<?php

require ('Classes/User.php');

if(isset($_POST["sub"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new User;
    if($user->login($username,$password))
    {
        echo "Redirect!";
    }
    else{
        echo "Wrong Username and Password!";
    }
}