<?php 

$hostname_Mysql ="localhost";
$database_Mysql ="d4all_test_laura";
$username_Mysql ="root";
$password_Mysql ="";

mysql_query("SET NAMES 'UTF8'");
$Mysql=mysql_connect($hostname_Mysql,$username_Mysql,$password_Mysql) or die (mysql_error());


 ?>