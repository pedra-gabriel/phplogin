<?php

include("conexao/conexao.php");


$editar = $_SESSION['identificador'];

$_SESSION['editelogin'] = $_POST['editelogin'];
$_SESSION['editesenha'] = md5($_POST['editesenha']);

if(isset($_SESSION['editelogin'], $_SESSION['editesenha']) && is_numeric($editar)) {


	$sql_code = "UPDATE usuario SET login = '$_SESSION[editelogin]', senha = '$_SESSION[editesenha]' WHERE id = '$editar'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	if($sql_query) {
		unset($_SESSION['editelogin'], $_SESSION['editesenha'], $_SESSION['identificador'], $_SESSION['usuario'], $_SESSION['acesso']);
		header("Location: entrar.php");
	} else {
		echo "<script>alert('não foi possível editar usuário');</script>";

	}
}