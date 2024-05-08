<?php

//conexao com o banco de dados
$db_name = 'budstrike';
$db_host = 'db';
$db_user = 'root';
$db_password = 'root';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_password);  
?>