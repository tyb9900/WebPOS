<?php

require_once ('Connection.php');
class User
{
    private $userConnection = null;

    public function __construct()
    {
        $this->userConnection = new Connection;
    }

    public function createNewUser($username,$password,$type)
    {
        try
        {
            if(!$this->userExist($username))
            {
                $query  = "INSERT INTO USERS (username,password,type) VALUES (?,?,?)";
                $prepared = $this->userConnection->prepareQuery($query);
                $hash = md5($password);
                print($hash);
                $params = [$username,$hash,$type];
                $this->userConnection->executeQuery($prepared,$params);
                return true;
            }
            else
            {
                echo "<script>alert(\"Username Already Exist!\");</script>";
                return false;
            }
        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
    }

    public function userExist($username)
    {
        try{
            $query = "SELECT * FROM USERS WHERE username=?";
            $prepared = $this->userConnection->prepareQuery($query);
            $params = [$username];
            $this->userConnection->executeQuery($prepared,$params);
            if($prepared->rowCount()>0)
            return true;
        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
        return false;
    }

    function deleteUser($username)
    {
        try{
            $query = "DELETE FROM USERS WHERE username=?";
            $prepared = $this->userConnection->prepareQuery($query);
            $params = [$username];
            $this->userConnection->executeQuery($prepared,$params);
            return true;
        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
        return false;
    }

    function updateUser($username,$type)
    {
        try{
            $query = "UPDATE USERS SET type=? WHERE username=?";
            $prepared = $this->userConnection->prepareQuery($query);
            $params = [$type,$username];
            $this->userConnection->executeQuery($prepared,$params);
                return true;
        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
        return false;
    }

    public function getUserCount()
    {
        try{
            $query = "SELECT * FROM USERS";
            $prepared = $this->userConnection->prepareQuery($query);
            $this->userConnection->executeQuery($prepared,null);
            return $prepared->rowCount();

        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
    }
    public function getUsers()
    {
        try{
            $query = "SELECT * FROM USERS";
            $prepared = $this->userConnection->prepareQuery($query);
            $this->userConnection->executeQuery($prepared,null);
            return $prepared;

        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
    }

    public function login($username,$password)
    {
        try{
            $query = "SELECT * FROM USERS WHERE username=?";
            $prepared = $this->userConnection->prepareQuery($query);
            $params = [$username];
            $this->userConnection->executeQuery($prepared,$params);
            if($prepared->rowCount()>0)
            {
                $res = $prepared->fetchAll();
              //  print_r($res);
                $hash = md5($password);
                //print($hash);
                if($res[0]['password']==$hash)
                {
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["type"] = $res[0]['type'];

                    return true;
                }
                else
                    echo "<script>alert(\"Wrong Password\");</script>";
            }
            else
                echo "<script>alert(\"Wrong Username\");</script>";
        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
        return false;
    }
}