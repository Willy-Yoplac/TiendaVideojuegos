<?php include_once("encabezado.php");   ?>
            <h1 class="text-center">Juegos Buscados</h1>
            <div class="card p-4 bg-light"> <!--pading 4 bakgrou-->
            
            <?php
            $ren = 0;
            for ($i=0; $i < count($datos["data"]); $i++) { 
              if ($ren==0) {
                print "<div class='row'>";
              }
              print "<div class='card pt-2 col-sm-3'>";
              print "<img src='".RUTA."img/".$datos['data'][$i]["imagen"]."' ";
              print "class='img-responsive' style='width:100%; height:140px;' ";
              print "alt='".$datos['data'][$i]["nombre"]."'/>";
              print "<p><a href='".RUTA."AdminProductos/producto/";
              print $datos['data'][$i]["idProducto"]."'>";
              print $datos['data'][$i]["nombre"]."</a></p>";
              print "</div>";
              $ren++;
              if ($ren==4) {
                $ren = 0;
                print "</div>";
              }
            }
          ?>
    
            </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>