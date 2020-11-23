<?php

include("navbar.php");

include("conexao/conexao.php");

include("protect.php");
protect();

?>
<style type="text/css"> .links td { border-style: outset; }</style>
<table class="links">
	<thead>
		<tr>
			<td>id</td>
			<td>file</td>
			<td>action</td>
		</tr>
	</thead>
	<tbody>
		
		<?php

		$sql_code = "SELECT * FROM files";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
		while($row = $sql_query->fetch_assoc()) {

		?>

			<tr>
				<td><?php echo $row['idfile']; ?></td>
				<td><?php echo $row['filename']; ?></td>
				<td><a href="download.php?id=<?php echo $row['idfile']; ?>">download</a></td>
			</tr>

		<?php } ?>

	</tbody>

</table>