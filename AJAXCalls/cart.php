<?php
require_once("../Classes/Stock.php");


if(isset($_REQUEST["Article"])) {
    $article = $_REQUEST["Article"];
    $stock = new Stock();
    $stock->setArticle($article);
    $res = $stock->retrieve();
    if ($res->rowCount() > 0) {
        $res = $res->fetchAll();
        foreach ($res as $r) {
            echo json_encode($r);
        }
    }
}