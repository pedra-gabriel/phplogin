<?php

require('sessionverify.php');

require("navbar.php");

require("protectedit.php");
protectedit();

require("edit.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>editar usuario</title>
	</head>
	<body>

		<?php echo @$erro ?>

		<form method="POST" action="">
			<input value="" type="text" name="editelogin">
			<input type="password" name="editesenha">
			<input type="submit" value="editar">
		</form>

	</body>
</html>