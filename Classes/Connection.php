<?php

class Connection
{
//   private $servername = 'localhost';
//   private $databaseName = 'WebPOS';
//   private $username = 'root';
   private $servername = 'sql308.epizy.com';
   private $databaseName = 'epiz_25231947_webPOS';
   private $username = 'epiz_25231947';
   private $password = 'GELXsYkoQ1Bt';   private $conn = null;
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
