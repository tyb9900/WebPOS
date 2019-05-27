<?php

require_once("../Classes/Sale.php");

// Unescape the string values in the JSON array
$tableData = stripcslashes($_REQUEST['TableData']);
$totalPairs = $_REQUEST["totalPairs"];
$totalAmount = $_REQUEST["totalAmount"];
$date = $_REQUEST["date"];

try
{
    $sale = new Sale();
    $sale->setDate($date);
    $sale->setPairs($totalPairs);
    $sale->setAmount($totalAmount);
    $sale->insert();
    echo "SUCCESS";

}
catch (Exception $ex)
{
    echo $ex->getMessage();
}


//
//// Decode the JSON array
//$tableData = json_decode($tableData,TRUE);
//
//foreach ($tableData as $data)
//{
//    echo $data["Article"];
//}