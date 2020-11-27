<?php

require("conexao/conexao.php");

$deletar = $_GET['usuario'];

$sql_code = "DELETE FROM usuario WHERE id = '$deletar'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

if($sql_query) {
	session_start();
	session_destroy();
	header('Location: entrar.php');
} else {
	echo "<script>alert('não foi possível excluir usuário');</script>";

}

//session destroy