<?php include_once("encabezado.php");   ?>
<h2 class="text-center">Registro</h2>
<form action="<?php print RUTA; ?>login/registro/" method="POST">
    <div class="form-group text-left">
        <label for="nombre">*Nombres:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required
        placeholder="Escriba su nombre">
    </div>
    <div class="form-group text-left">
        <label for="apellidoPaterno">* Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" required
        placeholder="Escriba su apellido paterno">
    </div>
    <div class="form-group text-left">
        <label for="apellidoMaterno">* Apellido Materno:</label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control"
        placeholder="Escriba su apellido materno">
    </div>
    <div class="form-group text-left">
        <label for="correo">* Correio electronico:</label>
        <input type="email" name="correo" id="correo" class="form-control" required
        placeholder="Escriba su correo electronico" required>
    </div>
    <div class="form-group text-left">
        <label for="clave1">* Clave de acceso:</label>
        <input type="password" name="clave1" id="clave1" class="form-control" required
        placeholder="Escriba su clave de acceso">
    </div>
    <div class="form-group text-left" required>
        <label for="clave2">* Repetir su clave acceso:</label>
        <input type="password" name="clave2" id="clave2" class="form-control" required
        placeholder="Verifique su clave de acceso" required>
    </div>
   
    <div class="form-group text-left" required>
        <label for="ciudad">* Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control" required
        placeholder="Escriba su ciudad" required>
    </div>
    <div class="form-group text-left" required>
        <label for="pais">* País:</label>
        <input type="text" name="pais" id="pais" class="form-control" required
        placeholder="Escriba su pais" required>
    </div>
    <div class="form-group text-left" required>
        <label for="enviar"></label>
        <input type="submit" value="Enviar datos" class="btn btn-success"
        role="button">
        <a href="<?php print RUTA; ?>login/" class="btn btn-info">Regresar</a>
    </div>

</form>
<?php include_once("piepagina.php");   ?>


