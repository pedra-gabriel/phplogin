<?php

include("create.php");

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