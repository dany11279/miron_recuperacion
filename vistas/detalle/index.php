<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php

require '../../modelos/aplicaciones.php';
try {
  
    $problemas_reportados = new aplicaciones($_GET);
 
    
    $problemas_reportados = $problemas_reportados->buscarT();
//var_dump($problemas_encontrados);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>aplicaciones</th>
                            <th>VER</th>
                          
                        </tr>
                    </thead>
                    <tbody>
    <?php if (count($problemas_reportados) > 0) : ?>
        <?php foreach ($problemas_reportados as $key => $problemas_reportados) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $problemas_reportados['SAN_NOMBRE'] ?></td>
                <td>
                    <?php if ($problemas_reportados['SAN_ESTADO'] == 2) { ?>
                        <a class="btn btn-warning w-75%" href="/miron_recuperacion/vistas/detalle/buscar.php?pro_id=<?= $tar['SAN_ID'] ?>"> ver</a>
                    <?php } else { ?>
                        no asignada aún
                    <?php } ?>
                </td>
                
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td colspan="4">NO EXISTEN REGISTROS</td>
        </tr>
    <?php endif ?>
</tbody>

                </table>
            </div>
        </div>
      
    </div>
</body>
</html>
<?php include_once '../../includes/footer.php'?>