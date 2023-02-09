<?php
$password = "";
$user = "root";
$bd_name = "prueba_tecnica_dev";

try {
    $bd = new PDO(
        'mysql:host=localhost;
        dbname=' . $bd_name,
        $user,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch(Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>