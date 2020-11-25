<?php

error_reporting( E_ALL ^E_NOTICE );

include("login.php");

include("protectlogin.php");
protectlogin();

if(isset($erro)) {
	echo "<script>alert('$erro');</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/libs/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/libs/fontawesome/css/brands.min.css">
		<link rel="stylesheet" type="text/css" href="assets/libs/fontawesome/css/solid.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/teste.css">
	<title></title>
</head>
<body>

		<div class="col-5 container caixalogin my-5 p-5 rounded">

			<div class="row">

				<div class="col-md-12 col-sm-12 col-12">
					
					<form name="formLogin" method="POST">

						<div class="form-group">
							<br>
							<input class="form-control bg-transparent text-light" type="text" name="login" placeholder="Usuário">
						</div>

						<div class="formGroup">
							<br>
							<input class="form-control bg-transparent text-light" type="password" name="senha" placeholder="Senha">
						</div>

						

						<div class="form-group">
							<input class="btn btn-outline-light my-3" type="submit" value="Entrar">
						</div>

					</form>

				</div>

				
			</div>

		</div>



<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/libs/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/libs/fontawesome/css/brands.min.css">
		<link rel="stylesheet" type="text/css" href="assets/libs/fontawesome/css/solid.min.css">


</body>
</html>
