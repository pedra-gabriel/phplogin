<?php

//arquivo que procura o filme no banco de dados

require("conexao/conexao.php");


//captura respectivamente tipo do arquivo(musica, imagem, texto etc...) e busca do usuário
$filter = mysqli_escape_string($mysqli, $_GET['session']);
$search = mysqli_escape_string($mysqli, $_GET['search']);

	if($filter != "geral"){

		$sql_code = "SELECT * FROM files WHERE session = '$filter' AND filename LIKE ('%" . $search . "%')";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	} else {

		$sql_code = "SELECT * FROM files WHERE filename LIKE ('%" . $search . "%')";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	}








 

