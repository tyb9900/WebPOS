<?php

class Connection
{
//   private $servername = 'localhost';
//   private $databaseName = 'WebPOS';
//   private $username = 'root';
    private $servername = 'remotemysql.com';
    private $databaseName = 'IxyghNOWMO';
    private $username = 'IxyghNOWMO';
   private $password = 'hEcGbld5C3';
   private $conn = null;
   public function __construct()
   {
       try {
           $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->databaseName", $this->username,$this->password);
           // set the PDO error mode to exception
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully";
       }
       catch(PDOException $e)
       {
           echo
           "<script>alert('Connection Error');</script>";
           echo "Connection failed: " . $e->getMessage();
       }
   }

   public function prepareQuery($query)
   {
       try {
           //echo "Query : ", $query;
           return $this->conn->prepare($query);
       }
       catch(PDOException $e)
       {
           "<script>alert('PDO Prepare Query Error');</script>";
           //echo "Error : " . $e->getMessage();
       }
       return null;
   }

    public function executeQuery($prepared,$parameters)
    {
        try {
           // echo "Parameters : ", print_r($parameters);
            $prepared->execute($parameters);
            //echo "Query Executed Successfully!";
        }
        catch(PDOException $e)
        {
            "<script>alert('PDO Execute Query Error');</script>";
        }
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->conn=null;
       // echo "Connection Closed";
    }
}