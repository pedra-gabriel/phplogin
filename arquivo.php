<?php

//pagina que mostra detalhes do arquivo selecionado
// error_reporting( E_ALL ^E_NOTICE );

require('sessionverify.php');

require("navbar.php");

require("downloadverify.php");

require("getarchive.php");

require("createcomment.php");

require("getcomment.php");

$row_arch = $sql_query_arch->fetch_assoc();

?>

<table class="archives">
	<tr><td><img height="400" src=<?php echo $row_arch['localimg'] ?>></td></tr>
	<tr><td> <?php echo $row_arch['filename'] ?> </td></tr>
	<tr><td>tamanho: <?php echo $row_arch['size'] ?> </td></tr>
	<tr><td> <?php echo $row_arch['details'] ?> </td></tr>
	<tr><td>baixado <?php echo $row_arch['downquant'] ?> vezes</td></tr>
	<tr><td><a href="download.php?download=<?php echo $row_arch['idfile']; ?>">download</a></td></tr>
</table> 

<br><br><br><br>

<form method="POST">
	<input type="text" name="comentario">
	<input type="submit" value="enviar">
</form>
<style type="text/css"> .coments td { border-style: outset; }</style>
<table class="coments">
	<tr>
		<td>comentários:</td>
	</tr>
	<?php while ($get_fetch = $sql_get_query->fetch_assoc())  {?>
	<tr>
		<td>
			<?php  echo $get_fetch['nomes'] ?>
		</td>
		<td>
			<?php  echo $get_fetch['commentes'] ?>
		</td>
	</tr>
	<?php } ?>
</table>