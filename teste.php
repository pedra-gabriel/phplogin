<?php

include("conexao/conexao.php");


$sql_code = "UPDATE usuario SET login = 'babaca', senha = 'babacao' WHERE id = 22";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);