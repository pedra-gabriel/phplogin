<?php
//verifica o tempo de 3 downloads para limitar o usuario a apenas 3 downloads por dia


$usuario_id = $_SESSION['usuario'];

error_reporting( E_ALL ^E_NOTICE );

//quando a session download é desmontada, o download é liberado
if(time() - $_SESSION['download1'][$usuario_id] > 3000) {unset($_SESSION['download1'][$usuario_id]);}
if(time() - $_SESSION['download2'][$usuario_id] > 3000) {unset($_SESSION['download2'][$usuario_id]);}
if(time() - $_SESSION['download3'][$usuario_id] > 3000) {unset($_SESSION['download3'][$usuario_id]);}