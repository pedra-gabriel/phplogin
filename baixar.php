<?php

error_reporting( E_ALL ^E_NOTICE );

include("navbar.php");

include("conexao/conexao.php");

include("protect.php");
protect();

?>
<style type="text/css"> .links td { border-style: outset; }</style>
<table class="links">

	<br>
	<div>
		<button>
			<a href="baixar.php">geral</a>
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
			<td>action</td>
		</tr>
	</thead>
	<tbody>
		
		<?php

		include("filtro.php");

		while ($row = $sql_query->fetch_assoc()) {

			if(file_exists('midia/' . $row['filename'])) {

		?>



		 	<tr>
				<td><?php echo $row['idfile']; ?></td>
				<td><?php echo $row['filename']; ?></td>
				<td><a href="download.php?id=<?php echo $row['idfile']; ?>">download</a></td>
			</tr>

		<?php } } echo $filtro; ?>

	</tbody>

</table>