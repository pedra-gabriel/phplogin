<?php

include("navbar.php");

include("conexao/conexao.php");

include("protect.php");
protect();

include("logout.php");
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

