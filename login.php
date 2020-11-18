<?php

include("conexao/conexao.php");

$erro = "";
 
if(isset($_POST['login']) && strlen($_POST['login']) > 0){

	if(!isset($_SESSION))

	$_SESSION['login'] = $_POST['login'];
	$_SESSION['senha'] = $_POST['senha'];

	$sql_code = "SELECT senha, id FROM usuario WHERE login = '$_SESSION[login]'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;

	if($total == 0) {

		$erro = "esse login nao existe";

	} else {

		if($dado['senha'] == $_SESSION['senha']) {

			session_start();
			$_SESSION['usuario'] = $dado['id'];
			echo "<script>alert('login efetuado com sucesso'); location.href='inicio.php';</script>";
			
		} else {

			$erro = "senha incorreta";

		}
	}
}	