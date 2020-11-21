<?php

include("protect.php");
protect();

include("logout.php");
if(isset($_POST['logout'])) {
	logouted();
}

echo "usuário: " . $_SESSION['nome'] . "<br>id do usuário: " . $_SESSION['usuario'] . "<br>acesso: " . $_SESSION['acesso'];

foreach ($_SESSION as $key => $value) {
    print($key . ' - ' . $value . '<br>');
};

?>

<h1>entrou</h1>

<form method="POST">
	<input type="submit" name="logout" value="logout">
</form>