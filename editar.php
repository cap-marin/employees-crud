<?php
include 'template/header.php';
include_once 'model/conexion.php';

if (isset($GET['codigo'])) {
    header('Location: index.php?errorcod=true');
    exit();
}

$codigo = $_GET['codigo'];
$sql_query = $bd->prepare("select * from empleado where id = ?;");
$sql_query->execute([$codigo]);
$empleado = $sql_query->fetch(PDO::FETCH_OBJ);

$sql_query = $bd->query("SELECT id, nombre as nom_area
FROM areas");
$area = $sql_query->fetchAll(PDO::FETCH_OBJ);

$sql_query_rol = $bd->query("SELECT id as id_rol, nombre as nom_rol
FROM roles");
$rol = $sql_query_rol->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Empleado
                </div>

                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre completo* </label>
                        <input type="text" class="form-control" name="txtNombre" required value="<?php echo $empleado->nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico* </label>
                        <input type="email" class="form-control" name="email" required value="<?php echo $empleado->email ?>">
                    </div>
                    <label class="form-label">Sexo* </label><br>
                    <div class="form-check mb-3">
                    
                        <input class="form-check-input" type="radio" name="txtSexo" id="flexRadioDefault2" value="M" <?php if ($empleado->sexo == 'M') echo "checked" ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtSexo" id="flexRadioDefault2" value="F" <?php if ($empleado->sexo == 'F') echo "checked" ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Femenino
                        </label><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área* </label><br>
                        <select name="txtArea" class="form-select form-select-sm">
                            <?php
                            foreach ($area as $ar) {

                            ?>
                                <option value="<?php echo $ar->id; ?>"><?php echo $ar->nom_area; ?></option>

                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción* </label>
                        <textarea class="form-control" name="txtDes" required value=""><?php echo $empleado->descripcion ?></textarea>
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