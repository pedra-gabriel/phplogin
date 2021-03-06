<?php

require('sessionverify.php');

require("navbar.php");

require("conexao/conexao.php");

require("protectlista.php");
protectlista();

if($_SESSION['acesso'] == 1) {
	//o usuario com acesso 1 é adm, nesse caso ele vê lista de todos os usuarios
	$sql_code = "SELECT * FROM usuario";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$linha = $sql_query->fetch_assoc();

} else {
	//usuario com acesso null é comum, só enxerga seus próprios dados na lista
	$sql_code = "SELECT * FROM usuario WHERE id = '$_SESSION[usuario]'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$linha = $sql_query->fetch_assoc();
}

?>
<style type="text/css"> .tabela td { border-style: outset; }</style>
<table class="tabela">
	<tr>
		<td>id</td>
		<td>login</td>
		<td>senha</td>
		<td>acesso</td>
	</tr>

	<?php do { ?>
	
	<tr>
		<td><?php echo $linha['id']; ?></td>
		<td><?php echo $linha['login']; ?></td>
		<td><?php echo $linha['senha']; ?></td>
		<td><?php echo $linha['acesso']; ?></td>
		<td><a href="delete.php?usuario=<?php echo $linha['id'];?>">excluir</a></td>
		<td><a href="editar.php?usuario=<?php echo base64_encode($linha['id']);?>">editar</a></td>
	</tr>

	<?php } while ($linha = $sql_query->fetch_assoc()); ?>

</table>

