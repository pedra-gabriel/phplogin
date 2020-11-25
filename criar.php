<?php

include("navbar.php");

include("create.php");

include("protectlogin.php");
protectlogin();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>criar usuario</title>
	</head>
	<body>

		<?php echo $erro ?>

		<form method="POST" action="">
			<input value="" type="text" name="create">
			<input type="password" name="senhas">
			<input type="submit" value="criar">
		</form>

	</body>
</html>