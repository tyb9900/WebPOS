<?php

class Connection
{
   private $servername = 'localhost';
   private $databaseName = 'WebPOS';
   private $username = 'root';
   private $conn = null;
   public function __construct()
   {
       try {
           $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->databaseName", $this->username);
           // set the PDO error mode to exception
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully";
       }
       catch(PDOException $e)
       {
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
           echo "Error : " . $e->getMessage();
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
            echo "Error : " . $e->getMessage();
        }
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->conn=null;
       // echo "Connection Closed";
    }
}