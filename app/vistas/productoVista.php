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
	//Vista de comentarios
	print "<h4>Comentarios</h4>"; 
	print "<div class='card p-4 bg-light'>";
	print "<table class='table table-striped' width='100%'>";
	print "<thead>";
	print "<th>Usuario</th>";
	print "<th>Comentario</th>";
	print "</thead>";

	print "<tbody>";
		for($i=0; $i<count($datos["dataComent"]); $i++){	
			print "<tr>";
			print "<td class='text-left'>".$datos["dataComent"][$i]["nombre"]."</td>";
			print "<td class='text-left'>".$datos["dataComent"][$i]["comentario"]."</td>";
			print "</tr>";
		}
	print "</tbody>";
	print "";
    print "</table>";
	print "</div>";
	
} else if($datos["data"]["tipo"]==2){
	
	print "<h4>Descripción:</h4>";
	print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";

	print "<h4>Desarrolladora:</h4>";
	print "<p>".$datos["data"]["desarrolladora"]."</p>";

	print "<h4>Editor:</h4>";
	print "<p>".$datos["data"]["editor"]."</p>";

	print "<h4>Precio:</h4>";
	print "<p>$".number_format($datos["data"]["precio"],2)."</p>";

	//Vista de comentarios
	print "<h4>Comentarios</h4>"; 
	print "<div class='card p-4 bg-light'>";
	print "<table class='table table-striped' width='100%'>";
	print "<thead>";
	print "<th>Usuario</th>";
	print "<th>Comentario</th>";
	print "</thead>";

	print "<tbody>";
		for($i=0; $i<count($datos["dataComent"]); $i++){	
			print "<tr>";
			print "<td class='text-left'>".$datos["dataComent"][$i]["nombre"]."</td>";
			print "<td class='text-left'>".$datos["dataComent"][$i]["comentario"]."</td>";
			print "</tr>";
		}
	print "</tbody>";
	print "";
    print "</table>";
	print "</div>";
}
$regresa = ($datos["regresa"]=="")? "tienda" : $datos["regresa"];
print "<a href='".RUTA.$regresa."' class='btn btn-success'/>Regresa</a>";
print "&nbsp";
print "<a href='".RUTA."carrito/agregaProducto/";
print $datos["data"]["idProducto"]."/";  //Id del producto
print $datos["idUsuarios"]."' ";  //Id del usuario
print "class='btn btn-success'/>Agregar al carrito</a>";

include_once("piepagina.php"); ?>