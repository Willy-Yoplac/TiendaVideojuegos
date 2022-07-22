<?php include_once("encabezado.php");   ?>
            <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
   <div class="card p-4 bg-light"> <!--pading 4 bakgrou-->
    <form action="<?php print RUTA; ?>login/olvido/"
    method="POST">   
     <div class="form-group text-left">
        <label for="email"> Correo electrónico </label>
        <input type="email" name="email" class="form-control">
     </div><br>
     
     <div class="form-group text-left">
        <input type="submit" value="Enviar" class="btn btn-success"></td>
        <a href="<?php print RUTA; ?>" class="btn btn-info">Regresar</a>
     </div><br>
      
    </form>
    <p>Se te enviará un correo, por favor verificar tu bandeja de spam.</p>
    </div> <!--para crear un cuadro-->
    
<?php include_once("piepagina.php");   ?>