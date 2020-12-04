<?php

error_reporting( E_ALL ^E_NOTICE );

require('sessionverify.php');

require("navbar.php");

require("conexao/conexao.php");

require("protect.php");
protect();

require("logout.php");
if(isset($_POST['logout'])) {
	logouted();
}

foreach ($_SESSION as $key => $value) {
    print($key . ' - ' . $value . '<br>');
};

?>

<h1>entrou</h1>

<form method="POST">
	<input type="submit" name="logout" value="logout">
</form>

