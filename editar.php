<?php

include("protectedit.php");
protectedit();

include("edit.php");

$_SESSION['identificador'] = $_GET['usuario'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>editar usuario</title>
	</head>
	<body>

		<?php echo $erro ?>

		<form method="POST" action="">
			<input value="" type="text" name="editelogin">
			<input type="password" name="editesenha">
			<input type="submit" value="editar">
		</form>

	</body>
</html>