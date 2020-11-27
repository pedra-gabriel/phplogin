<?php

require("conexao/conexao.php");
		//se o arquivo existe:


			//captura a quant de downloads ja feitas pelo usuario
			$sql_code_quant = "SELECT downloads FROM usuario WHERE id = '1'";
			$sql_queryQ = $mysqli->query($sql_code_quant) or die ($mysqli->error);
			$quant = $sql_queryQ->fetch_assoc();

			//soma 1 na quantidade de downloads
			$new_quant = $quant['downloads'] + 1;

			$sql_code_new_quant = "UPDATE usuario SET downloads='$new_quant' WHERE id = '1'";
				$sql_queryNQ = $mysqli->query($sql_code_new_quant) or die ($mysqli->error);

			echo "quant = " . $quant . "<br>new quant = " . $new_quant . "<br><br>";

			var_dump($quant);