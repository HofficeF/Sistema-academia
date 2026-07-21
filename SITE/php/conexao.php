<?php

$host="127.0.0.1";
$user="root";
$pass="";
$db="db_academia";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error){
    die("Erro de Conexão: " . $conn->connect_error);
}
?>