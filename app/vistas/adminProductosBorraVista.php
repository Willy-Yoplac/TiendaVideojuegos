<?php include_once("encabezado.php");   ?>
<h1 class="text-center">Borrar un Porducto</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>adminProductos/baja/" method="POST" enctype="multipart/form-data">

     <div class="form-group text-left"> 
        <label for="usuario">Tipo del producto: </label>
        <select class="form-control" name="tipo" id="tipo" disabled>
            <option value="void">Selecciona el tipo de producto</option>
            <?php
                for ($i=0; $i < count($datos["tipoProducto"]); $i++) { 
                   print "<option value='".$datos["tipoProducto"][$i]["indice"]."'";
                   if(isset($datos["data"]["tipo"])){
                        if($datos["data"]["tipo"]==$datos["tipoProducto"][$i]["indice"]){
                        print " selected ";
                        }
                   }
                   print ">".$datos["tipoProducto"][$i]["cadena"]."</option>";
                }
            ?>
        </select>
     </div>

     <div class="form-group text-left">
        <label for="nombre"> Nombre del producto: </label>
        <input type="text" name="nombre" class="form-control" disabled
        placeholder="Escribe el nombre del producto" 
        value="<?php 
        print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left">
      <label for="content">Descripción:</label>
      <input type="text" name="descripcion" class="form-control" disabled
        placeholder="Escribe la descripcion del producto" 
        value="<?php 
        print isset($datos['data']['descripcion'])?$datos['data']['descripcion']:''; 
        ?>"
        >
    </div>

    <div class="form-group text-left">
        <label for="desarrolladora"> Desarrolladora: </label>
        <input type="text" name="desarrolladora" class="form-control" disabled
        placeholder="Escribe la desarrolladora" 
        value="<?php 
        print isset($datos['data']['desarrolladora'])?$datos['data']['desarrolladora']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left">
        <label for="editor">Editor: </label>
        <input type="text" name="editor" class="form-control" disabled
        placeholder="Escribe el editor" 
        value="<?php 
        print isset($datos['data']['editor'])?$datos['data']['editor']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="precio">Precio del producto: </label>
        <input type="text" name="precio" class="form-control" disabled
        pattern="^(\d|-)?(\d|,)*\.?\d*$"
        placeholder="Escribe el precio del producto (sin comas ni símbolos)" 
        value="<?php 
        print isset($datos['data']['precio'])?$datos['data']['precio']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="descuento">Descuento del producto: </label>
        <input type="text" name="descuento" class="form-control" disabled
        pattern="^(\d|-)?(\d|,)*\.?\d*$"
        placeholder="Escribe el descuento del producto"
        value="<?php 
        print isset($datos['data']['descuento'])?$datos['data']['descuento']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="imagen">Imagen del producto: </label>
        <input type="file" name="imagen"id="imagen" class="form-control"
        accept="imagen/jpeg"/>
        <?php
        if (isset($datos['data']['imagen'])) {
            print "<p>".$datos['data']['imagen']."</p>";
        }
        ?>
     </div>

     <div class="form-group text-left"> 
        <label for="fecha_lanzamiento"> Fecha de lanzamiento del producto: </label>
        <input type="date" name="fecha_lanzamiento" class="form-control" disabled
        placeholder="Fecha de lanzamiento" 
        value="<?php 
        print isset($datos['data']['fecha_lanzamiento'])?$datos['data']['fecha_lanzamiento']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="status">Estado del producto: </label>
        <select class="form-control" name="status" id="status" disabled>
            <option value="void">Selecciona el status del producto</option>
            <?php
                for ($i=0; $i < count($datos["statusProducto"]); $i++) { 
                   print "<option value='".$datos["statusProducto"][$i]["indice"]."'";
                   if(isset($datos["data"]["status"])){
                        if($datos["data"]["status"]==$datos["statusProducto"][$i]["indice"]){
                        print " selected ";
                        }
                   }
                   print ">".$datos["statusProducto"][$i]["cadena"]."</option>";
                }
            ?>
        </select>
     </div>

     <div class="form-check text-left"> 
        <input type="checkbox" name="nuevos" id="nuevos" class="form-check-input"
        <?php
        if (isset($datos['data']['nuevos'])) {
            if($datos['data']['nuevos']=="on") print " checked ";
        }
        ?>
        ><label for="nuevos" class="form-check-label" disabled>Producto Nuevo</label>
     </div>

     </div class="form-group text-left"><br>
     <input type="hidden" id="idProducto" name="idProducto" value="<?php print $datos['data']['idProducto']; ?>"/>
     
        <input type="submit" value="SI" class="btn btn-danger">
        <a href="<?php print RUTA; ?>adminProductos" class="btn btn-danger">NO</a>
        <p>Una vez que los datos son eliminados no se pueden recuperar (salvo desde la BD)</p>
     </div>
    </form>
    </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>