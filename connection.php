<?php

$db_host = "127.0.0.1";
$db_user = "root";
$db_password = "Onionweasel2852!";
$db_name = "training";

try{
    $db = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e) {
    echo $e->getMessage();
}

