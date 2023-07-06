<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<?php
require '../../modelos/Grados.php';
try {
    $app = new Grado($_GET);
    $Grados = $app->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>
<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario del Registro de Oficiales Encargados</h1>
    <div class="row justify-content-center mt-2">
        <form action="/miron_recuperacion/controladores/of_encargado/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="of_nombre" class="fs-5">Nombres:</label>
                <input type="text" class="form-control" name="of_nombres" id="of_nombres" required>
            </div>
            <div class="form-group mb-3">
                <label for="of_apellidos" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="of_apellidos" id="of_apellidos" required>
            </div>
            <div class="form-group mb-3">
                <label for="of_grados" class="fs-5">Grado y arma:</label>
                <select class="form-select" name="of_grado" id="of_grado" required>
                    <option value="">Seleccionar grado y arma</option>
                    <?php foreach ($Grados as $grado) : ?>
                        <option value="<?= $grado['GRA_ID'] ?>"><?= $grado['GRA_NOMBRE'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="of_correo" class="fs-5">Correo:</label>
                <input type="email" class="form-control" name="of_correo" id="of_correo" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
