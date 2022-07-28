<?php include_once("encabezado.php");   ?>
<h1 class="text-center">Borrar un usuario Administrativo</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>adminUsuarios/baja/" method="POST">
     <div class="form-group text-left"> 
        <label for="correo">Usuario: </label>
        <input type="email" name="correo" class="form-control"
        placeholder="Escribe tu correo electrónico" disabled
        value="<?php 
        print isset($datos['data']['correo'])?$datos['data']['correo']:''; 
        ?>"
        >
     </div>
     
     <div class="form-group text-left"> 
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" class="form-control"
        placeholder="Escribe tu nombre" disabled
        value="<?php 
        print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
        ?>"
        >
     </div>

     <div class="form-group">
        <label for="status">Selecciona un estado</label>
        <select class="form-control" name="status" id="status" disabled> 
            <option value="void">Selecciona el estado del usuario</option>
            <?php
            for ($i=0; $i < count($datos["status"]); $i++) { 
                print "<option value='".$datos["status"][$i]["indice"]."'";
                if($datos["status"][$i]["indice"]==$datos["data"]){
                    print " selected ";
                }
                print ">".$datos["status"][$i]["cadena"]."</option>";
            }
            ?>
        </select>
     </div>

     </div class="form-group text-left"><br>
     <input type="hidden" id="idAdmin" name="idAdmin" value="<?php print $datos['data']['idAdmin']; ?>"/>
     
        <input type="submit" value="Si" class="btn btn-danger">
        <a href="<?php print RUTA; ?>adminUsuarios" class="btn btn-danger">No</a>
        <p>Cuando los datos son borrados, no se puede recuperar el registo (mentirita)</p>
     </div>
    </form>
    </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>