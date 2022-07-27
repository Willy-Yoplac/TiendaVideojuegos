<?php include_once("encabezado.php"); ?>
<h1 class="text-center">Lista de Usuarios</h1>
<div class="card p-4 bg-light">
	<table class="table table-striped" width="100%">
	<thead>
		<th>id</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Modifica</th>
		<th>Borrar</th>
	</thead>
	<tbody>
		<?php
		for($i=0; $i<count($datos['data']); $i++){
			print "<tr>";
			print "<td class='text-center'>".$datos["data"][$i]["idAdmin"]."</td>";
			print "<td class='text-left'>".$datos["data"][$i]["nombre"]."</td>";
			print "<td class='text-left'>".$datos["data"][$i]["correo"]."</td>";
			print "<td><a href='".RUTA."adminUsuarios/cambio/".$datos["data"][$i]["idAdmin"]."' class='btn btn-info'>Modificar</a></td>";
			print "<td><a href='' class='btn btn-danger'>Borrar</a></td>";
			print "</tr>";
		}
		?>
	</tbody>

	</table>
	<a href="<?php print RUTA; ?>adminUsuarios/alta" class="btn btn-success">Crear nuevo Admin</a>
</div>
<?php include_once("piepagina.php"); ?>