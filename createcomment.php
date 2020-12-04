<?php

include("conexao/conexao.php");

session_start();

$id_file = mysqli_escape_string($mysqli, $_GET['id']);

if(isset($_POST['comentario'])) {
	$comentario = mysqli_escape_string($mysqli, $_POST['comentario']);

	$user_id = $_SESSION['usuario'];
	$user_names = $_SESSION['nome'];



	$sql_code_comm = "INSERT INTO comentarios (commentes, usuarios, archive, nomes) VALUES ('$comentario', '$user_id', '$id_file', '$user_names')";
	$sql_comm_query = $mysqli->query($sql_code_comm) or die ($mysqli->error);
}