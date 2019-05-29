<?php

require_once ('Connection.php');
class User
{
    private $userConnection = null;
    private $TABLE;
    public function __construct()
    {
        $this->userConnection = new Connection;
        $this->TABLE = "users";
    }

    public function createNewUser($username,$password,$type)
    {
        try
        {
            if(!$this->userExist($username))
            {
                $query  = "INSERT INTO $this->TABLE (username,password,type,img) VALUES (?,?,?,?)";
                $prepared = $this->userConnection->prepareQuery($query);
                $hash = md5($password);
                print($hash);
                $img = "graphics/users/user.png";
                $params = [$username,$hash,$type,$img];
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
            $query = "SELECT * FROM $this->TABLE WHERE username=?";
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
            $query = "DELETE FROM $this->TABLE WHERE username=?";
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
            $query = "UPDATE $this->TABLE SET type=? WHERE username=?";
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
            $query = "SELECT * FROM $this->TABLE";
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
            $query = "SELECT * FROM $this->TABLE";
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
            $query = "SELECT * FROM $this->TABLE WHERE username=?";
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
                    $_SESSION["userimg"] = $res[0]['img'];

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

    public function uploadPicture($basename,$username)
    {
        try {
            $query = "UPDATE $this->TABLE  SET img = ? WHERE username=?";
            echo "<script>alert($query);</script>";
            $prepared = $this->userConnection->prepareQuery($query);
            $params = [$basename,$username];
            $this->userConnection->executeQuery($prepared, $params);

        } catch (Exception $ex) {
            echo "Error : ", $ex;
        }
    }
}