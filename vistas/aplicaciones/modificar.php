<?php
require '../../modelos/aplicaciones.php';
    try {
      
        $aplicaciones = new aplicaciones($_GET);
        
        $app = $aplicaciones->buscar();
        //var_dump($app);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar aplicaciones</h1>
        <div class="row justify-content-center">
            <form action="/miron_recuperacion/controladores/aplicaciones/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="san_id" value="<?= $app[0]['SAN_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_nombre">Nombre de la aplicaciones</label>
                        <input type="text" name="san_nombre" id="san_nombre" value="<?= $app[0]['SAN_NOMBRE'] ?>" class="form-control" required>
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