<?php
include 'template/header.php';
include 'model/conexion.php';

print_r($_POST);
if (
    empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["email"]) || empty($_POST["txtSexo"])
    || empty($_POST["txtArea"]) || empty($_POST["txtDes"])
) {
    echo "Datos incompletos";
    header('Location: index.php?mensaje=falta');
    exit();
}

$txtNombre = $_POST['txtNombre'];
$email = $_POST['email'];
$txtSexo = $_POST['txtSexo'];
$txtArea = $_POST['txtArea'];
$txtDes = $_POST['txtDes'];
$txtRol = $_POST['txtRol'];
$txtBole = 1;

$sql_query = $bd->prepare('INSERT INTO empleado (nombre, email, sexo, area_id, boletin, descripcion) VALUES
(?, ?, ?, ?, ?, ?);');

$result = $sql_query->execute([$txtNombre, $email, $txtSexo, $txtArea, $txtBole, $txtDes]);

if ($result === true){
    header('Location: index.php?registrado=success');
}else{
    header('Location: index.php?error=true');
    exit();
}
/*
$sql_query_sel = $bd->query("SELECT emp.id
FROM empleado as emp
WHERE emp.email='".$email."'");
$employee_id = $sql_query_sel->fetch(PDO::FETCH_OBJ);
echo $email;
$emp_id = json_decode(json_encode($employee_id), true);
echo $emp_id;

$sql_query_rol = $bd->prepare('INSERT INTO empleado_rol (empleado_id, rol_id) VALUES
(?, ?);');

$result_rol = $sql_query_rol->execute([$emp_id, $txtRol]);

if ($result_rol === true && $result === true){
    header('Location: index.php?registrado=success');
}else{
    header('Location: index.php?error=true');
    exit();
}
*/
?>

<?php
include 'template/footer.php';
?>