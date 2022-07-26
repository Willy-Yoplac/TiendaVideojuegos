<?php include_once("encabezado.php");   ?>
<h1 class="text-center">Módulo Administrativo</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>admin/verifica/" method="POST">
     <div class="form-group text-left"> 
        <label for="usuario"> Usuario: </label>
        <input type="text" name="usuario" class="form-control"
        placeholder="Escribe tu correo electrónico"
        value="<?php 
        print isset($datos['data']['usuario'])?$datos['data']['usuario']:''; 
        ?>"
        >
     </div>
     <div class="form-group text-left">
        <label for="clave"> Clave de acceso: </label>
        <input type="password" name="clave" class="form-control"
        placeholder="Escribe tu clave de acceso (sin espacios en blanco)"
        value="<?php 
        print isset($datos['data']['clave'])?$datos['data']['clave']:''; 
        ?>"
        >
     </div class="form-group text-left"><br>
     
     <div>
        <input type="submit" value="Enviar" class="btn btn-success"></td>
     </div><br>
     <div> 
    </form>
    </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>