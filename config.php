<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "test";

$id = "";
$fname = "";
$sname = "";
$email = "";

$link = mysql_connect($host, $user, $password) or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db('test') or die('Не удалось выбрать базу данных');


?>