<?php

require ('Connection.php');
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
            }
            else
            {
                echo "username already exists";
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
                print_r($res);
                $hash = md5($password);
                print($hash);
                if($res[0]['password']==$hash)
                    return true;
                else
                    echo "wrong password";
            }
            else
                echo "User Not Found";
        }
        catch (Exception $ex)
        {
            echo "Error : ", $ex;
        }
        return false;
    }
}