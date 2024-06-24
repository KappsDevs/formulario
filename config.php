<?php

$server = "localhost";
$usuario = "root";
$senha = "";
$banco = "formulario";

//conexão com o banco
$conn = new mysqli($server, $usuario, $senha, $banco);

//verificar conexão
if($conn->connect_error){
    die("Falha ao se comunicar com BD".$conn->connect_error);
}

?>