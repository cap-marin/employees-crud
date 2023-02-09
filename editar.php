<?php
include 'template/header.php';
include_once 'model/conexion.php';

if(isset($GET['codigo'])){
    header('Location: index.php?errorcod=true');
    exit();
}

$codigo = $_GET['codigo'];
$sql_query = $bd->prepare("select * from empleado where id = ?;");
$sql_query->execute([$codigo]);
$empleado = $sql_query->fetch(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Empleado
                </div>

                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre completo* </label>
                        <input type="text" class="form-control" name="txtNombre" required
                        value="<?php echo $empleado->nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico* </label>
                        <input type="email" class="form-control" name="email" required
                        value="<?php echo $empleado->email ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo* </label>
                        <input type="text" class="form-control" name="txtSexo" required
                        value="<?php echo $empleado->sexo ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área* </label>
                        <input type="text" class="form-control" name="txtArea" required
                        value="<?php echo $empleado->area_id ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción* </label>
                        <input type="text" class="form-control" name="txtDes" required
                        value="<?php echo $empleado->descripcion ?>">
                    </div>
                    <div class="mb-2">
                        <input type="hidden" name="codigo" value="<?php echo $empleado->id ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>