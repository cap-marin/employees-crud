<?php include 'template/header.php';
include 'model/conexion.php';
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
                    <div class="mb-3">
                        <label class="form-label">Sexo* </label>
                        <input type="text" class="form-control" name="txtSexo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área* </label>
                        <input type="text" class="form-control" name="txtArea" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción* </label>
                        <input type="text" class="form-control" name="txtDes" autofocus required>
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