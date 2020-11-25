<?php

include("conexao/conexao.php");

$erro = "";

if(isset($_POST['create'])) {

	$user = mysqli_escape_string($mysqli, $_POST['create']);

	if(strlen($_POST['senhas']) < 6) {
		$erro = "Sua senha deve ter no mínimo 6 caracteres";
	} else {

		$sql_verifica = "SELECT login FROM usuario WHERE login = '$user'";
		$sql_ver = $mysqli->query($sql_verifica);
		$exists_login = $sql_ver->fetch_assoc();

		if($exists_login) {

			echo "<script>alert('esse login já existe'); location.href='criar.php';</script>";

		} else {

			$senha = mysqli_escape_string($mysqli, md5($_POST['senhas']));

			$sql_code = "INSERT INTO usuario (login, senha) VALUES ('$user', '$senha')";

			$confirma =  $mysqli->query($sql_code) or die ($mysqli->error);

			if($confirma) {
				header("Location: entrar.php");
			} else {
				$erro = "Não foi possível conectar com banco de dados";
			}
		}
	}
}