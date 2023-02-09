<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'template/header.php';
include_once 'model/conexion.php';
$sql_query = $bd->query("SELECT emp.id, emp.nombre as nom, emp.email, 
CASE WHEN emp.sexo = 'F' THEN 'Femenino' WHEN emp.sexo = 'M' THEN 'Masculino' END as sexo,
ar.nombre as nom_area, 
CASE WHEN emp.boletin = '1' THEN 'Sí' WHEN emp.boletin = '0' THEN 'No' END as boletin
FROM `empleado` as emp
LEFT JOIN areas as ar on (emp.area_id = ar.id)");
$employee = $sql_query->fetchAll(PDO::FETCH_OBJ);
//print_r($employee);

?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Lista de Empleados
                </div>

                <div class="card-body text-right">
                    <a href="#" class="btn btn-primary"><i class="person-add"></i>Crear</a>
                </div>

                <div class="p-2">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Área</th>
                                <th scope="col">Boletín</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employee as $emp) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $emp->nom; ?></td>
                                    <td><?php echo $emp->email; ?></td>
                                    <td><?php echo $emp->sexo; ?></td>
                                    <td><?php echo $emp->nom_area; ?></td>
                                    <td><?php echo $emp->boletin; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Crear Empleado
                </div>
                <!-- Alerts!-->
                <?php
                if (isset($_GET['mensaje'])) {
                ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                        Los campos con asteriscos (*) son obligatorios.
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['registrado'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                        Registro exitoso.
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['error'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                        Registro exitoso.
                    </div>
                <?php
                }
                ?>
                <!-- Alerts!-->
                <form class="p-4" method="POST" action="register.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre completo* </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico* </label>
                        <input type="email" class="form-control" name="email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo* </label>
                        <input type="text" class="form-control" name="txtSexo" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área* </label>
                        <input type="text" class="form-control" name="txtArea" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción* </label>
                        <input type="text" class="form-control" name="txtDes" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Roles* </label>
                        <input type="text" class="form-control" name="txtRol" autofocus>
                    </div>
                    <div class="mb-2">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php';
?>