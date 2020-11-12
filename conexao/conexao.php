<?php

$host 	= "localhost";
$user 	= "root";
$db 	= "phplogin";
$senha 	= "";

$mysqli = mysqli_connect($host, $user, $senha) or die (mysqli_error());

mysqli_select_db($mysqli, $db);
