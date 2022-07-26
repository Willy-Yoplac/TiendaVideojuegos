<?php include_once("encabezado.php");   ?>
<h2 class="text-center">Registro</h2>
<form action="<?php print RUTA; ?>login/registro/" method="POST">
    <div class="form-group text-left">
        <label for="nombre">*Nombres:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required
        placeholder="Escriba su nombre" 
        value='<?php isset($datos["data"]["nombre"])? print $datos["data"]["nombre"]:""; ?>'> 
    </div>


    <div class="form-group text-left">
        <label for="apellidoPaterno">* Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" required
        placeholder="Escriba su apellido paterno"
        value='<?php isset($datos["data"]["apellidoPaterno"])? print $datos["data"]["apellidoPaterno"]:""; ?>'>
    </div>

    <div class="form-group text-left">
        <label for="apellidoMaterno">* Apellido Materno:</label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control"
        placeholder="Escriba su apellido materno"
        value='<?php isset($datos["data"]["apellidoMaterno"])? print $datos["data"]["apellidoMaterno"]:""; ?>'>
    </div>

    <div class="form-group text-left">
        <label for="email">* Correo electrónico:</label>
        <input type="email" name="email" id="email" class="form-control" required
        placeholder="Escriba su email electronico" required
        value='<?php isset($datos["data"]["email"])? print $datos["data"]["email"]:""; ?>'>
    </div>

    <div class="form-group text-left">
        <label for="clave1">* Clave de acceso:</label>
        <input type="password" name="clave1" id="clave1" class="form-control" required
        placeholder="Escriba su clave de acceso"
        value='<?php isset($datos["data"]["clave1"])? print $datos["data"]["clave1"]:""; ?>'>
    </div>

    <div class="form-group text-left" required>
        <label for="clave2">* Repetir su clave acceso:</label>
        <input type="password" name="clave2" id="clave2" class="form-control" required
        placeholder="Verifique su clave de acceso" required
        value='<?php isset($datos["data"]["clave2"])? print $datos["data"]["clave2"]:""; ?>'>
    </div>
   
    <div class="form-group text-left" required>
        <label for="ciudad">* Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control" required
        placeholder="Escriba su ciudad" required
        value='<?php isset($datos["data"]["ciudad"])? print $datos["data"]["ciudad"]:""; ?>'>
    </div>

    <div class="form-group text-left" required>
        <label for="pais">* País:</label>
        <input type="text" name="pais" id="pais" class="form-control" required
        placeholder="Escriba su pais" required
        value='<?php isset($datos["data"]  ["pais"])? print $datos["data"]["pais"]:""; ?>'>
    </div>

    <div class="form-group text-left" required>
        <label for="enviar"></label>
        <input type="submit" value="Enviar datos" class="btn btn-success"
        role="button">
        <a href="<?php print RUTA; ?>login/" class="btn btn-info">Regresar</a>
    </div>

</form>
<?php include_once("piepagina.php");   ?>


