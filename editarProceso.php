<?php
print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: index.php?editerror=true');
}

include 'model/conexion.php';

$codigo = $_POST['codigo'];
$txtNombre = $_POST['txtNombre'];
$email = $_POST['email'];
$txtSexo = $_POST['txtSexo'];
$txtArea = $_POST['txtArea'];
$txtDes = $_POST['txtDes'];

$sql_query = $bd->prepare("UPDATE empleado SET nombre = ?, email = ?,
sexo = ?, area_id = ?, descripcion = ? WHERE id = ?;");
$result = $sql_query->execute([$txtNombre, $email, $txtSexo, $txtArea, $txtDes, $codigo]);

if ($result === true) {
    header('Location: index.php?editado=success');
} else {
    header('Location: index.php?erroredit=true');
    exit();
}


?>