<?php

error_reporting( E_ALL ^E_NOTICE );

require('sessionverify.php');

require("navbar.php");

?>

<style type="text/css"> .links td { border-style: outset; }</style>
<table class="links">

	<br>
	<div>
		<button>
			<a href="baixar.php?session=geral">geral</a>
		</button>
		<button>
			<a href="baixar.php?session=imagens">imagens</a>
		</button>
		<button>
			<a href="baixar.php?session=musicas">musicas</a>
		</button>
		<button>
			<a href="baixar.php?session=textos">textos</a>
		</button>
		<button>
			<a href="baixar.php?session=apps">aplicativos</a>
		</button>
</div>

	<thead>
		<tr>
			<td>id</td>
			<td>file</td>
			<td>imagem</td>
			<td>action</td>
		</tr>
	</thead>
	<tbody>
		
		<?php

		include("filtro.php");

		while ($row = $sql_query->fetch_assoc()) {

			if(file_exists($row['local'] . '/' . $row['filename'])) {

		?>

		 	<tr>
				<td><?php echo $row['idfile']; ?></td>
				<td><?php echo $row['filename']; ?></td>
				<td><img width="70" src=<?php echo $row['localimg'] ?>></td>
				<td><a href="download.php?id=<?php echo $row['idfile']; ?>">download</a></td>
			</tr>

		<?php } }; ?>

	</tbody>

</table>


<?php $filtro = $_GET['session']; ?>
<form method="GET" action="">
	<input type="hidden" name="session" value=<?php echo $filtro ?>>
	<input type="text" name="search">
	<input type="submit" value="procurar">
</form>

<?php echo $filter . "<br>"; echo $search ?>

  