<?php

$id_archive = mysqli_escape_string($mysqli, $_GET['id']);

$sql_code_get = "SELECT usuarios, commentes, archive, nomes FROM comentarios WHERE archive = '$id_archive'";
$sql_get_query = $mysqli->query($sql_code_get) or die ($mysqli->error);
