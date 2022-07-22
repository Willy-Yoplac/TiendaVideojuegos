<?php include_once("encabezado.php");   ?>
            <h1 class="text-center">Cambia tu clave de acceso</h1>
            <div class="card p-4 bg-light"> <!--pading 4 bakgrou-->
    <form action="<?php print RUTA; ?>login/cambiaclave/" method="POST">
    <!-- Me habia olvidado del metodo POST po eso no funcionaba -->
     
     <div class="form-group text-left">
        <label for="clave1"> Clave acceso: </label>
        <input type="password" name="clave1" class="form-control">
     </div><br>

     <div class="form-group text-left">
        <label for="clave2"> Repite tu clave de acceso: </label>
        <input type="password" name="clave2" class="form-control">
     </div><br>
     
     <div class="form-group text-left">
        <!-- para no perder los datos en mandar correo -->
        <input type="hidden" name="id" value="<?php print $datos['data']; ?>"/>
        <input type="submit" value="Enviar" class="btn btn-success"></td>
        <a href="<?php print RUTA.'login/'; ?>" class='btn btn-info'>Regresar</a>
     </div><br>  
    </form>
    </div> <!--para crear un cuadro-->
    
<?php include_once("piepagina.php");   ?>