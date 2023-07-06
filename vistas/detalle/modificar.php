<?php
require '../../modelos/problemas_reportados.php';
require '../../modelos/sancion.php';
//var_dump($_REQUEST);    

try {
    $problemas_encontrados = new problemas_reportados($_REQUEST);
   // var_dump($problemas_encontrados);
    $problemas_reportados = $problemas_encontrados->buscarpro_id();
   // var_dump($problemas_reportados);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}



?>

<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar Estado</h1>
    <div class="row justify-content-center">
        <form action="/miron_recuperacion/controladores/detalle/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="pro_id" id="pro_id" value="<?= $problemas_reportados[0]['PRO_ID'] ?>">
            <input type="hidden" name="pro_app" id="pro_app" value="<?= $problemas_reportados[0]['PRO_APP'] ?>">
            <div class="row mb-3">
           
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="problemas_encontrados">problemas_encontrados</label>
                    <texproblemas_encontrados name="pro_descripcion" id="pro_descripcion" class="form-control" rows="4" required><?= $problemas_reportados[0]['PRO_DESCRIPCION'] ?></texproblemas_encontrados>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select name="pro_estado" id="pro_estado" class="form-control" required>
                        <option value="1" <?php if ($problemas_reportados[0]['PRO_ESTADO'] == 1) echo 'selected' ?>> CERRADO</option>
                        <option value="2" <?php if ($problemas_reportados[0]['PRO_ESTADO'] == 2) echo 'selected' ?>>ABIRTO</option>
                        <option value="3" <?php if ($problemas_reportados[0]['PRO_ESTADO'] == 3) echo 'selected' ?>>OTRO</option>
                    </select>
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
