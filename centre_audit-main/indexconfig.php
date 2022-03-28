<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";
// try connecting to database
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
// else 
// echo("done");
/*
this file contain database configuration assuming we are running mysql using user "root" and passward ""(by default by xampp server)
*/