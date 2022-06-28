<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" 
integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" 
integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" 
crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="index.php" class="navbar-brand">Tienda Virtual</a> 
    </nav>
    <div class="Container-fluid">
        <div class="row content">
            <div class="col-sm-2"></div> <!--pantalla pequeño se maneja por dos colum-->
            <div class="col-sm-8"> <!--8 columnas por ahora-->
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
    </div> <!--8 colum-->
    <div class="col-sm-2"></div>
    </div> <!--row-->
    </div> <!--container-->
    
</body>
</html>