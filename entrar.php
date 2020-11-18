<?php

include("login.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>pagina de login</title>
	</head>
	<body>

		<?php echo $erro ?>

		<form method="POST" action="">
			<input value="" type="text" name="login">
			<input type="password" name="senha">
			<input type="submit" value="entrar">
		</form>

	</body>
</html>