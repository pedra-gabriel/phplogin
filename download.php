<?php

require("conexao/conexao.php");

	session_start();

	$usuario_id = $_SESSION['usuario'];

	if(isset($_GET['id'], $_SESSION['usuario'], $_SESSION['nome']) && is_numeric($_SESSION['usuario'])) {


		//captura a quant de downloads ja feitas pelo usuario
		$sql_code_quant = "SELECT downloads FROM usuario WHERE id = '$usuario_id'";
		$sql_queryQ = $mysqli->query($sql_code_quant) or die ($mysqli->error);
		$quant = $sql_queryQ->fetch_assoc();


		if($quant['downloads'] < 3) {

			$id = mysqli_escape_string($mysqli, $_GET['id']); //id do arquivo


			//procura arquivo no banco
			$sql_code = "SELECT * FROM files WHERE idfile = '$id'";
			$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
			$data = $sql_query->fetch_assoc();


			//se o arquivo existe:
			if($data) {

				$file = 'midia/' . $data['filename'];

				if(file_exists($file)) {

					
					//soma 1 na quantidade de downloads
					$new_quant = $quant['downloads'] + 1;


					//add novo valor download no banco
					$sql_code_new_quant = "UPDATE usuario SET downloads='$new_quant' WHERE id = $usuario_id";
					$sql_queryNQ = $mysqli->query($sql_code_new_quant) or die ($mysqli->error);


					header('Content-Description: ' . $data['description']);
					header('Content-Type: ' . $data['type']);
					header('Content-Disposition: ' . $data['disposition'] . '; Filename=' . basename($file));
					header('Expires: ' . $data['expires']);
					header('Cache-Control: ' . $data['cache']);
					header('Content-lenght: ' . filesize($file));
					readfile($file);
					exit;
				}
			}

		} else {
			echo "<script>alert('voce excedeu o limite de downloads gratuitos. assine uma conta premium para continuar utilizando nossos serviços'); location.href='baixar.php?session=geral';</script>";
		}	

	} else {
		header('Location: baixar.php?session=geral');
	}
