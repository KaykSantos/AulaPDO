<?php

$db = "aula_pdo";
$host = "localhost";
$user = "root";
$pass = "";

$dns = "mysql:host=".$host."; dbname=".$db;
$pdo = new PDO($dns, $user, $pass);

?>