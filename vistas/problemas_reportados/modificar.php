<?php
require '../../modelos/problemas_reportados.php';
require '../../modelos/aplicaciones.php';

try {
    $problemas_reportados = new problemas_reportados($_GET);
    $problemas_reportados = $problemas_reportados->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


try {
      
    $app = new aplicaciones($_GET);
    
    $aplicaciones = $app->buscar();
   //var_dump($aplicaciones);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar problemas reportados</h1>
    <div class="row justify-content-center">
        <form action="/miron_recuperacion/controladores/problemas_reportados/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="pro_id" id="pro_id" value="<?= $problemas_reportados[0]['PRO_ID'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label for="aplicaciones">sancion</label>
                    <select name="pro_app" id="pro_app" class="form-select" required>
                        <?php foreach ($aplicaciones as $app) : ?>
                            <option value="<?= $app['SAN_ID'] ?>" <?= ($app['SAN_NOMBRE'] === $problemas_reportados[0]['SAN_NOMBRE']) ? 'selected' : '' ?>><?= $app['SAN_NOMBRE'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="problemas_reportados">problemaS reportados</label>
                    <texproblemas_reportados name="pro_descripcion" id="pro_descripcion" class="form-control" rows="4" required><?= $problemas_reportados[0]['PRO_DESCRIPCION'] ?></texproblemas_reportados>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="fecha_asignacion">Fecha de Asignación</label>
                    <input type="date" name="pro_fecha" id="pro_fecha" value="<?= $problemas_reportados[0]['PRO_FECHA'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>