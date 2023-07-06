<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>

<?php
require '../../modelos/of_encargado.php';
require '../../modelos/Grados.php';

try {
    $problemas_encontrados = new of_encargado($_GET);
    $of_encargado = $problemas_encontrados->buscar2();
   //var_dump($of_encargado);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {      
    $app = new Grado();
    $Grados = $app->buscar();
    //var_dump($Grados);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
si

<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario para modificar el Oficial Encargado</h1>
    <div class="row justify-content-center mt-2">
        <form action="/miron_recuperacion/controladores/of_encargado/modificar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="of_nombre" class="fs-5">Nombres:</label>
                <input type="hidden" class="form-control" name="of_id" id="of_id" value="<?= $of_encargado[0]['of_ID'] ?? '' ?>" required>
                <input type="text" class="form-control" name="of_nombres" id="of_nombres" value="<?= $of_encargado[0]['OF_NOMBRES'] ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="of_apellidos" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="of_apellidos" id="of_apellidos" value="<?= $of_encargado[0]['OF_APELLIDOS']  ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="of_grados" class="fs-5">Grado:</label>
                <select class="form-select" name="of_grado" id="of_grado" required>
                    <option value="">Seleccionar grado</option>
                    <?php foreach ($Grados as $grado) : ?>
                        <option value="<?= $grado['GRA_ID'] ?>" <?= ($of_encargado[0]['of_GRADO'] ?? '') == $grado['GRA_ID'] ? 'selected' : '' ?>>
                            <?= $grado['GRA_NOMBRE'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="of_correo" class="fs-5">Correo:</label>
                <input type="email" class="form-control" name="of_correo" id="of_correo" value="<?= $of_encargado[0]['OF_CORREO'] ?? '' ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php' ?>
