<?php include_once("encabezado.php");   ?>
<h1 class="text-center">Modifica un usuario Admin</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>adminUsuarios/cambio/" method="POST">
     <div class="form-group text-left"> 
        <label for="usuario">* Usuario: </label>
        <input type="email" name="usuario" class="form-control"
        placeholder="Escribe tu correo electrónico" required
        value="<?php 
        print isset($datos['data']['usuario'])?$datos['data']['usuario']:''; 
        ?>"
        >
     </div>
     <div class="form-group text-left">
        <label for="clave1">* Clave de acceso: </label>
        <input type="password" name="clave1" class="form-control"
        placeholder="Escribe tu clave de acceso (sin espacios en blanco)" required
        value="<?php 
        print isset($datos['data']['clave1'])?$datos['data']['clave1']:''; 
        ?>"
        >
     </div>
     <div class="form-group text-left">
        <label for="clave2"> Verifica clave de acceso: </label>
        <input type="password" name="clave2" class="form-control"
        placeholder="Vuelve a escribir tu clave de acceso"
        value="<?php 
        print isset($datos['data']['clave2'])?$datos['data']['clave2']:''; 
        ?>"
        >
     </div>
     <div class="form-group text-left"> 
        <label for="nombre">* Nombre: </label>
        <input type="text" name="nombre" class="form-control"
        placeholder="Escribe tu nombre" required
        value="<?php 
        print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
        ?>"
        >
     </div>

     <div class="form-group">
        <label for="status">Selecciona un status</label>
        <select class="form-control" name="status" id="status">
            <option value="void">Selecciona el estado del usuario</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
     </div>

     </div class="form-group text-left"><br>
     
     <div>
        <input type="submit" value="Enviar" class="btn btn-success">
        <a href="<?php print RUTA; ?>adminUsuarios" class="btn btn-info">Regresar</a>
     </div>
    </form>
    </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>