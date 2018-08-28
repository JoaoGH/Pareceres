<?php

$hostIP = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'pareceres';
//comando para conectar com BD mysql
$conexao=  mysqli_connect('localhost', 'root', '');
//comando para selecionar o BD que vai utilizar
$base_de_dados= mysqli_select_db($conexao, $banco);
?>