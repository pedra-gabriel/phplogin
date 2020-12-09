<?php

//arquivo que captura arquivo selecionado para pagina de detalhes

require("conexao/conexao.php");

//id do filme
if(isset($_GET['id'])) { 

	$id_file = mysqli_escape_string($mysqli, $_GET['id']);	

	$sql_code_arch = "SELECT idfile, filename, localimg, session, size, details, downquant FROM files WHERE idfile = '$id_file'";
	$sql_query_arch = $mysqli->query($sql_code_arch) or die ($mysqli->error);
}