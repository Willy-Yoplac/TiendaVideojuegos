<?php
//Manejo de la base de datosMySQL

class MySQLdb {

    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "clientes_videojuegos"; 
    
    private $conn; // coneccion

    function __construct(){
        // propiedades -> pasamos con THIS
        $this->conn =mysqli_connect($this->host,
        $this->usuario,
        $this->clave,
        $this->db); //conectamos a BD

        if (mysqli_connect_errno()){
            printf("Error en la conexion a la base de datos %s",
            mysqli_connect_errno());
            exit();
        }else{
           // print "Conexion exitosa con la Base de Datos"."<br>";
        }
       
        if (!mysqli_set_charset($this->conn, "utf8")){
            printf("Error en el camio de caracteres %s",
            mysqli_connect_error());
            die(); // o exit

        }else{
           // print "El conjunto de caracteres es: ".mysqli_character_set_name($this->conn)."<br>";
        }
    }// fin constructura

    //Query regresa un solo registro en un arreglo asociado
    function query ($sql){
        $data = array();
        $r = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($r)>0){
          $data = mysqli_fetch_assoc($r);
      }
      return $data;
    }

    //Query regresa un valor voleano
    function queryNoSelect ($sql){
        
        $r = mysqli_query($this->conn, $sql);
        return $r;
    }
}

?>