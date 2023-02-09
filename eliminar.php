<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?droperror=true');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sql_query = $bd->prepare("DELETE FROM empleado WHERE id = ?;");
    $result = $sql_query->execute([$codigo]);

    if ($result === true){
        header('Location: index.php?dropped=true');

    }else{
        header('Location: index.php?droperror=true');
    }
?>