<?php
require ("Classes/Category.php");
$var = new Category();
$var->setid(1);
$var->setName("ServisOYE");
$res = $var->retriveAll();
if($res->rowCount()>0)
print_r($res->fetchAll());