<?php

error_reporting(E_ALL & ~E_NOTICE);

include("conexao/conexao.php");


if(isset($_POST['login']) && strlen($_POST['login']) > 0){

	if(!isset($_SESSION))
		

	$_SESSION['login'] = $_POST['login'];
	$_SESSION['senha'] = $_POST['senha'];

	$sql_code = "SELECT senha, id FROM usuario WHERE login = '$_SESSION[login]'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;

	if($total == 0) {
		$erro = "esse login nao existe";
	} else {
		if($dado['senha'] == $_SESSION['senha']) {
			session_start();
			$_SESSION['usuario'] = $dado['id'];
		} else {
			$erro = "senha incorreta";
		}
	}

	if(!isset($erro)) {
		echo "<script>alert('login feito'); location.href='inicio.php'; </script>";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
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