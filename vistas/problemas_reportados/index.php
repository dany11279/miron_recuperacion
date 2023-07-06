<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
require '../../modelos/aplicaciones.php';
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

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE PROBLEMAS REPORTADOS</h1>
  <div class="row justify-content-center mt-2">
    <form action="/miron_recuperacion/controladores/problemas_reportados/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="aplicaciones">Seleccione una sancion:</label>
        <select class="form-select" name="pro_app" id="tar_app" required>
          <option value="">Seleccionar sancio</option>
          <?php foreach ($aplicaciones as $apps) { ?>
            <option value="<?php echo $apps['SAN_ID']; ?>"><?php echo $apps['SAN_NOMBRE']; ?></option>
          <?php } ?>
        </select>
      </div>
 
      <div class="form-group">
        <label for="descripcion">Descripción de la problemas reportados:</label>
        <texproblemas_reportados class="form-control" name="pro_descripcion" id="pro_descripcion" rows="4"></texproblemas_reportados>
      </div>
      <div class="form-group">
        <label for="fecha">Fecha de asignacion</label>
        <input type="date" class="form-control" name="tar_fecha" id="tar_fecha" required>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
  </div>
</div>


<?php include_once '../../includes/footer.php'?>