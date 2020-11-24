<?php

$filtro = $_GET['session'];

if(!is_null($filtro)){

	$sql_code = "SELECT * FROM files WHERE session = '$filtro'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

} else {

	$sql_code = "SELECT * FROM files";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

}
