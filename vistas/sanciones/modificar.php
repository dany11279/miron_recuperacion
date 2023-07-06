<?php
require '../../modelos/sanciones.php';
    try {
      
        $sanciones = new sanciones($_GET);
        
        $app = $sanciones->buscar();
        //var_dump($app);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar sanciones</h1>
        <div class="row justify-content-center">
            <form action="/miron_recuperacion/controladores/sanciones/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="app_id" value="<?= $app[0]['APP_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_nombre">Nombre de la sanciones</label>
                        <input type="text" name="app_nombre" id="app_nombre" value="<?= $app[0]['APP_NOMBRE'] ?>" class="form-control" required>
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
<?php include_once '../../includes/footer.php'?>