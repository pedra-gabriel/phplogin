<?php

include("conexao/conexao.php");

session_start();

if(isset($_SESSION['usuario'])){

	if(isset($_GET['id'])) {

		$id = $_GET['id'];

		$sql_code = "SELECT * FROM files WHERE idfile = '$id'";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
		$data = $sql_query->fetch_assoc();

		$file = 'midia/' . $data['filename'];

		if(file_exists($file)) {
			header('Content-Description: ' . $data['description']);
			header('Content-Type: ' . $data['type']);
			header('Content-Disposition: ' . $data['disposition'] . '; Filename=' . basename($file));
			header('Expires: ' . $data['expires']);
			header('Cache-Control: ' . $data['cache']);
			header('Content-lenght: ' . filesize($file));
			readfile($file);
			exit;
			echo "deu";
		}

	}
} else {
	echo "<script>alert('faça login primeiro'); location.href='baixar.php';</script>";
}