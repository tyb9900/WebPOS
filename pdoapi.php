<?php
require_once ("Classes/Connection.php");
$con = new Connection();

if(isset($_REQUEST["query"]) && isset($_REQUEST["params"]))
{
    $query = $_REQUEST["query"];
    $params = $_REQUEST["params"];
    $prepared = $this->prepareQuery($query);
    $this->executeQuery($prepared,$params);
    return $prepared;
}