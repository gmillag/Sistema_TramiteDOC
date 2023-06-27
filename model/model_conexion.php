<?php
/*Conectar a una base de datos de MariaDB invocando al controlador*/

class conexionBD{

    public function conexionPDO(){
        $host       ="localhost";
        $usuario    ="root";
        $contrasena ="";
        $bdName      ="sistema_tramite";

        try{
            $pdo = new PDO("mysql:host=$host;dbname=$bdName",$usuario,$contrasena);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8");
            return $pdo;

            

        }catch(PDOException $e){
            echo 'Falló la conexión : '.$e->getMessage();

        }

    }

    function cerrar_conexion(){
        $this->$pdo=null;
    }


}

// Crear una instancia de la clase ConexionBD
$conexion = new ConexionBD();

// Intentar establecer la conexión
$pdo = $conexion->conexionPDO();

// Verificar si hay una conexión exitosa
if ($pdo) {
    echo "Conexión exitosa a la base de datos";
} else {
    echo "No se pudo establecer la conexión a la base de datos";
}



?>
