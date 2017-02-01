<?php

	error_reporting(1);

$mysql_host = "localhost";
$mysql_database = "premijer_liga";
$mysql_user = "root";
$mysql_password = "";

$con=  mysql_connect($mysql_host,$mysql_user,$mysql_password);
if(!$con)
    die("Konekcija nije uspjela! Greska: "+  mysql_error());


$chosenDB=mysql_select_db($mysql_database);
if(!$chosenDB)
    die("Povezivanje sa bazom neuspjesno! Greska: "+  mysql_error());

session_start();
?>