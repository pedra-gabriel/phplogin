<?php



//faz logout no usuário para session nao ficar aberta caso o usuario não se desloge



if(!isset($_SESSION)){session_start();}

if ($_SESSION['registro']) {
	$segundos = time() - $_SESSION['registro'];	//registra o momento do login
}

if($segundos > 50000) {	//limita tempo de inatividade em 5min
	unset($_SESSION['usuario'], $_SESSION['nome'], $_SESSION['acesso'], $_SESSION['registro']);	//logout após isso
	header('Location: entrar.php');
} else {
	$_SESSION['registro'] = time();
}