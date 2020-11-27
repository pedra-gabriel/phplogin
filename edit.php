<?php

require("conexao/conexao.php");

if(isset($_GET['usuario'])){
$editar = base64_decode($_GET['usuario']);
} else { header('Location: entrar.php');};

@$editlogin = mysqli_escape_string($mysqli, $_POST['editelogin']);
@$editsenha = mysqli_escape_string($mysqli, md5($_POST['editesenha']));

if(isset($_POST['editelogin'], $_POST['editesenha']) && is_numeric($editar) && $editar == $_SESSION['usuario']) {


	$sql_code = "UPDATE usuario SET login = '$editlogin', senha = '$editsenha' WHERE id = '$editar'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	if($sql_query) {
		unset($_SESSION['editelogin'], $_SESSION['editesenha'], $_SESSION['identificador'], $_SESSION['usuario'], $_SESSION['acesso']);
		header("Location: entrar.php");
	} else {
		echo "<script>alert('não foi possível editar usuário');</script>";

	}
} 