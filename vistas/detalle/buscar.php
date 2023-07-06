<?php
include_once '../../includes/header.php';
include_once '../../includes/navbar.php';

require '../../modelos/aplicaciones.php';
require '../../modelos/Asignar.php';
require '../../modelos/problemas_reportados.php';

// Obtener el nombre de la aplicación
//var_dump($_REQUEST);
try {
    $san_id = $_REQUEST['pro_id'] ?? null;
    $san = new aplicaciones(['san_id' => $san_id]);
    //var_dump($san);
    $sans = $san->buscarsan();
  
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

// Obtener el nombre del programador
try {
    $asig_san = $_REQUEST['pro_id'] ?? null;
    $nombre = new Asignar(['asig_san' => $asig_san]);

    $nombres = $nombre->buscarnom();
   // var_dump($nombres);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

// Obtener los problemas reportados 
try {
    $pro_san = $_REQUEST['pro_id'] ?? null;
    $proea = new problemas_reportados(['pro_san' => $pro_san]);
    $proe = $proea->buscarpro();

    $totalproblemas_reportados = count($proe);
    $totalFinalizadas = 0;
    foreach ($proe as $pro) {
        if ($pro['PRO_ESTADO'] == 3) {
            $totalFinalizadas++;
        }
    }
    $porcentajeTrabajoRealizado = ($totalFinalizadas / $totalproblemas_reportados) * 100;
  
    if (is_nan($porcentajeTrabajoRealizado)){
       $porcentajeTrabajoRealizado = floatval("0.00");
    }
   // var_dump($porcentajeTrabajoRealizado);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<body>
    <div class="container border bg-light py-4 mt-4">
        <h1 class="mt-4">Detalle de Sancion</h1>

        <div class="row mt-4">
            <div class="col">
                <h5>Nombre de Sancion:</h5>
                <input type="text" class="form-control" value="<?= $sans[0]['SAN_NOMBRE'] ?>" readonly>
            </div>
            <div class="col">
                <h5>of_encargado:</h5>
                <input type="text" class="form-control" value="<?= $nombres[0]['NOMBRE'] ?>" readonly>
            </div>
        </div>

        <h5 class="mt-4">problemas reportados:</h5>
        <table class="table table-bordered mt-2">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col" class="text-center">Número</th>
            <th scope="col" class="text-center">Problema reportado</th>
            <th scope="col" class="text-center">Fecha</th>
            <th scope="col" class="text-center">Estado</th>
            <th scope="col" class="text-center">Cambio</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($proe) > 0) : ?>
            <?php foreach ($proe as $key => $pro) : ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td class="text-center"><?= $pro['PRO_DESCRIPCION'] ?></td>
                    <td class="text-center"><?= $pro['PRO_FECHA'] ?></td>
                    <td class="text-center">
                        <?php
                        $estado = "";
                        $estadoClass = "";
                        switch ($pro['PRO_ESTADO']) {
                            case 1:
                                $estado = "NO INICIADA";
                                $estadoClass = "bg-danger";
                                break;
                            case 2:
                                $estado = "EN PROCESO";
                                $estadoClass = "bg-warning";
                                break;
                            case 3:
                                $estado = "FINALIZADA";
                                $estadoClass = "bg-success";
                                break;
                        }
                        ?>
                        <span class="badge <?= $estadoClass ?>"><?= $estado ?></span>
                    </td>
                  <td><a class="btn btn-warning w-100" href="/miron_recuperacion/vistas/detalle/modificar.php?pro_id=<?=$pro['PRO_ID']?>">Modificar</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="text-center">No hay problemas reportados disponibles</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


        <div class="row">
    <div class="col">
        <h5>Cantidad de Problemas Reportados:</h5>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?= number_format($porcentajeTrabajoRealizado, 2) ?>%;" aria-valuenow="<?= number_format($porcentajeTrabajoRealizado, 2) ?>" aria-valuemin="0" aria-valuemax="100"><?= number_format($porcentajeTrabajoRealizado, 2) ?>%</div>
        </div>
    </div>
</div>


    <?php include_once '../../includes/footer.php' ?>
</body>
