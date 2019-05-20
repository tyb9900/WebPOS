<?php

require ('Classes/User.php');


$u = new User;

if($u->login("tyb","123"))
echo "\nWELCOME\n";