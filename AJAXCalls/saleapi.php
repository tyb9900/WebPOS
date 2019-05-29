<?php

require_once("../Classes/Sale.php");
require_once("../Classes/Stock.php");

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

// Decode the JSON array
    $tableData = json_decode($tableData,TRUE);
    $stock = new Stock();
    foreach ($tableData as $data)
    {
        try{

        $stock->setArticle($data["Article"]);
        $stock->setQuantity((-1) * (int)$data["Pairs"]);
        $stock->insert();
        }
        catch (Exception $ex)
        {

        }
    }

}
catch (Exception $ex)
{
    echo $ex->getMessage();
}
