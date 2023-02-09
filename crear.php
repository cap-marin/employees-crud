<?php include 'template/header.php';
include 'model/conexion.php';
$sql_query = $bd->query("SELECT id, nombre as nom_area
FROM areas");
$area = $sql_query->fetchAll(PDO::FETCH_OBJ);

$sql_query_rol = $bd->query("SELECT id as id_rol, nombre as nom_rol
FROM roles");
$rol = $sql_query_rol->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container py-5">
    <div class="row justify-content-center">
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
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                        Error.
                    </div>
                <?php
                }
                ?>
                <!-- Alerts!-->
                <form class="p-4" method="POST" action="register.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre completo* </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico* </label>
                        <input type="email" class="form-control" name="email" autofocus required>
                    </div>
                    <label class="form-label">Sexo* </label><br>
                    <div class="form-check mb-3">
                    
                        <input class="form-check-input" type="radio" name="txtSexo" id="flexRadioDefault2" value="M" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtSexo" id="flexRadioDefault2" value="F">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Femenino
                        </label>
                    </div><br>
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
                        <textarea class="form-control" name="txtDes"></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Deseo recibir boletín informativo
                        </label>
                    </div><br>


                    <div class="mb-3">
                        <label class="form-label">Roles* </label>
                        
                            <?php
                            foreach ($rol as $ro) {

                            ?>
                            <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="txtRol" value="<?php echo $ro->id_rol; ?>" id="flexRol" >
                                <label class="form-check-label" for="flexCheckChecked">
                                    <?php echo $ro->nom_rol; ?>
                                </label>
                        </div><br>

                    <?php
                            }
                    ?>

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