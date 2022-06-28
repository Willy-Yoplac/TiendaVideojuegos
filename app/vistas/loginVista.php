<?php include_once("encabezado.php");   ?>
            <h1 class="text-center">Entrada al sistema</h1>
            <div class="card p-4 bg-light"> <!--pading 4 bakgrou-->
    <form action="login/verifica/">
     <div class="form-group text-left"> 
        <label for="usuario"> Usuario: </label>
        <input type="text" name="usuario" class="form-control">
     </div>
     <div class="form-group text-left">
        <label for="clave"> Clave acceso: </label>
        <input type="password" name="clave" class="form-control">
     </div class="form-group text-left"><br>
     
     <div>
        <input type="submit" value="Enviar" class="btn btn-success"></td>
     </div><br>
     <div>
        <input type="checkbox" name="recordar" >
        <label for="recordar">Recordar</label>  
     </div class="form-group text-left"><br>  
    </form>
    </div> <!--para crear un cuadro-->
    <a href="login/alta/" >Darse de alta en el sistema</a><br><br>
    <a href="login/olvido/" >¿Olvide mi clave de acceso?</a>
    <?php include_once("piepagina.php");   ?>