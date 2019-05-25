<?php
$hostname = "localhost";
$dbname = "myDatabase";
$username = "root";
$password  = "";
$con = null;
try
{
    $con = new PDO("mysql:host=$hostname",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "CREATE DATABASE myDatabase";
    $con->exec($query);
}
catch (PDOException $ex)
{
    echo $ex->getMessage();
}

$con = null;

try
{
    $con = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "Create Table Login(username VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL)";
    $con->exec($query);
}
catch(PDOException $ex)
{
    echo $ex->getMessage();
}

try
{
$con = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
 $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO Login(username,password) VALUES(?,?)";
    $prepare = $con->prepare($query);
    $username = "tyb";
    $password = "123";
    $params = [$username,$password];
    $params1 = ["arsi","123"];
    $prepare->execute($params);
    $prepare->execute($params1);

    $username = "arslan";
    $password = "1234";

    $query = "UPDATE Login SET username=?,password=?";
    $prepare = $con->prepare($query);
    $params = [$username,$password];
    $prepare->execute($params);

    $username="arslan";

    $query = "DELETE FROM Login WHERE username=?";
    $prepare = $con->prepare($query);
    $prepare->execute(["arslan"]);

    $query = "SELECT *FROM Login";
    $prepare = $con->prepare($query);
    $params = [$username];
    $prepare->execute($params);
    $res = $prepare->fetchAll();

    foreach ($res as $r)
    {
     echo $r["username"] . " : " . $r["password"]. "\n";
    }
}
catch(PDOException $ex)
{
    echo $ex->getMessage();
}

