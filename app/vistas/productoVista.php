<?php include_once("encabezado.php"); 

print "<h2 class='text-center'>".$datos["subtitulo"]."</h2>";
print "<img src='".RUTA."img/".$datos["data"]["imagen"]."' class='rounded float-right'/>";
//Aventura y Deportes
if ($datos["data"]["tipo"]==1) {
	
	print "<h4>Descripción:</h4>";
	print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";

	print "<h4>Desarrolladora:</h4>";
	print "<p>".$datos["data"]["desarrolladora"]."</p>";

	print "<h4>Editor:</h4>";
	print "<p>".$datos["data"]["editor"]."</p>";

	print "<h4>Precio:</h4>";
	print "<p>$".number_format($datos["data"]["precio"],2)."</p>";

} else if($datos["data"]["tipo"]==2){
	
	print "<h4>Descripción:</h4>";
	print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";

	print "<h4>Desarrolladora:</h4>";
	print "<p>".$datos["data"]["desarrolladora"]."</p>";

	print "<h4>Editor:</h4>";
	print "<p>".$datos["data"]["editor"]."</p>";

	print "<h4>Precio:</h4>";
	print "<p>$".number_format($datos["data"]["precio"],2)."</p>";
}
$regresa = ($datos["regresa"]=="")? "tienda" : $datos["regresa"];
print "<a href='".RUTA.$regresa."' class='btn btn-success'/>Regresa</a>";

include_once("piepagina.php"); ?>