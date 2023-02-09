<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'template/header.php';
include_once 'model/conexion.php';
$sql_query = $bd->query("SELECT emp.id, emp.nombre as nom, emp.email, 
CASE WHEN emp.sexo = 'F' THEN 'Femenino' WHEN emp.sexo = 'M' THEN 'Masculino' END as sexo,
ar.nombre as nom_area, 
CASE WHEN emp.boletin = '1' THEN 'Sí' WHEN emp.boletin = '0' THEN 'No' END as boletin
FROM empleado as emp
LEFT JOIN areas as ar on (emp.area_id = ar.id)");
$employee = $sql_query->fetchAll(PDO::FETCH_OBJ);
//print_r($employee);

?>


<div class="container p-5">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <?php
            if (isset($_GET['errorcod']) && $_GET['errorcod'] == 'true') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                    Vuelve a intentar.
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['editado'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                    Actualización exitosa.
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['dropped'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                    Empleado eliminado.
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
            <div class="card">
                <div class="card-header">
                    Lista de Empleados
                </div>

                <div class="card-body text-right">
                    <a href="crear.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Crear</a>
                </div>

                <div class="p-2">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col"><i class="bi bi-person-fill"></i> Nombre</th>
                                <th scope="col">@ Email</th>
                                <th scope="col"><i class="bi bi-gender-ambiguous"></i> Sexo</th>
                                <th scope="col"><i class="bi bi-wallet-fill"></i> Área</th>
                                <th scope="col"><i class="bi bi-envelope-fill"></i> Boletín</th>
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
                                    <td class="text-center"><?php echo $emp->boletin; ?></td>
                                    <td class="text-center"><a class="text-success" href="editar.php?codigo=<?php echo $emp->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td class="text-center"><a onclick="return confirm('Estás seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $emp->id; ?>"><i class="bi bi-trash3"></i></a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php';
?>