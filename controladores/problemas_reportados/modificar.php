<?php
require '../../modelos/problemas_reportados.php';


if ($_POST != '') {
    try {
    
        $fechaPost = $_POST['tar_fecha'];
        $fechaObjeto = date_create($fechaPost);
        $fechaFormateada = date_format($fechaObjeto, 'd/m/Y'); 
        $datosproblemas_reportados = $_POST;
        $datosproblemas_reportados['tar_fecha'] = $fechaFormateada;
        $problemas_reportados = new problemas_reportados($datosproblemas_reportados);
// var_dump($problemas_reportados);
// exit;

        $resultado = $problemas_reportados->modificar();
        $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
} else {
    $error = "Debe ingresar todos los datos";
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
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Modificado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/miron_recuperacion/controladores/problemas_reportados/buscar.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
