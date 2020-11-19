<?php

include("protect.php");
protect();

include("logout.php");
if(isset($_POST['logout'])) {
	logouted();
}

echo "o id do usuário logado é " . $_SESSION['usuario'] . " e o acesso é " . $_SESSION['acesso'];

?>

<h1>entrou</h1>

<form method="POST">
	<input type="submit" name="logout" value="logout">
</form>