<?php

require("conexao/conexao.php");

	session_start();

	$usuario_id = $_SESSION['usuario'];

	//se existe id do filme; usuario; nome; e se usuário é numérico:
	if(isset($_GET['download'], $_SESSION['usuario'], $_SESSION['nome']) && is_numeric($_SESSION['usuario'])) {


		
		//variável que será utilizada para liberar download
		$liberacao = false;

		//dá inicio a uma sessao download que irá limitar a quantidade de downloads por tempo
		if(!isset($_SESSION['download1'][$usuario_id])) {

			$_SESSION['download1'][$usuario_id] = time();
			$liberacao = true;

		} else if (!isset($_SESSION['download2'][$usuario_id])) {

			$_SESSION['download2'][$usuario_id] = time();
			$liberacao = true;

		} else if (!isset($_SESSION['download3'][$usuario_id])) {

			$_SESSION['download3'][$usuario_id] = time();
			$liberacao = true;
		}

		//verifica se o usuário é um usuário pago - caso positivo, downloads ilimitados
		$sql_premium_verify = "SELECT premium FROM usuario WHERE id = '$usuario_id'";
		$sql_premium_query = $mysqli->query($sql_premium_verify) or die ($mysqli->error);
		$usu = $sql_premium_query->fetch_assoc();




		
		
		



		//verifica se usuario tem downloads disponíveis
		if($liberacao == true || $usu['premium'] == 1) {

			//id do arquivo
			$idfile = mysqli_escape_string($mysqli, $_GET['download']); 


			//procura arquivo no banco
			$sql_code = "SELECT * FROM files WHERE idfile = '$idfile'";
			$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
			$data = $sql_query->fetch_assoc();


			//se o arquivo existe:
			if($data) {

				//define local do arquivo
				$file = $data['local'] . '/' . $data['filename'];

				//se o arquivo existe no local indicado:
				if(file_exists($file)) {

					
					

					//captura a quant de 'downloads' ja feitas pelo usuario
					$sql_code_quant = "SELECT downloads FROM usuario WHERE id = '$usuario_id'";
					$sql_queryQ = $mysqli->query($sql_code_quant) or die ($mysqli->error);
					$quant = $sql_queryQ->fetch_assoc();


					//soma 1 na quantidade de downloads feitas pelo usuario
					$new_quant = $quant['downloads'] + 1;


					//add novo valor 'downloads' do usuario no banco
					$sql_code_new_quant = "UPDATE usuario SET downloads = '$new_quant' WHERE id = '$usuario_id'";
					$sql_queryNQ = $mysqli->query($sql_code_new_quant) or die ($mysqli->error);





					//captura quantidade de dowloads que o arquivo já tem 
					//e soma mais um na coluna 'downquant'
					$sql_down_quant = "SELECT downquant FROM files WHERE idfile = '$idfile'";
					$sql_query_quant = $mysqli->query($sql_down_quant) or die ($mysqli->error);
					$down_quant = $sql_query_quant->fetch_assoc();
					$new_down_quant = $down_quant['downquant'] + 1;
					$sql_down_new_quant = "UPDATE files SET downquant='$new_down_quant' WHERE idfile = $idfile";
					$sql_query_new_quant = $mysqli->query($sql_down_new_quant) or die ($mysqli->error);






					//executa download
					header('Content-Description: ' . $data['description']);
					header('Content-Type: ' . $data['type']);
					header('Content-Disposition: ' . $data['disposition'] . '; Filename=' . basename($file));
					header('Cache-Control: ' . $data['cache']);
					header('Content-lenght: ' . filesize($file));
					readfile($file);
					exit;
				}
			}

		} else {
			//se usuário não tiver downloads disponíveis:
			echo "<script>alert('voce excedeu o limite de downloads diarios. assine uma conta premium para continuar utilizando nossos serviços, ou dá uma esperadinha aí tio'); location.href='baixar.php?session=geral';</script>";
		}	

	} else {
		header('Location: baixar.php?session=geral');
	}
 