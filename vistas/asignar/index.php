<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
require '../../modelos/aplicaciones.php';
require '../../modelos/of_encargado.php';
    try {
      
        $app = new aplicaciones();
        
        $aplicaciones = $app->buscar();
     //var_dump($aplicaciones);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }


try {
  
    $of_encargado = new of_encargado();
 
    
    $of_encargado = $of_encargado->buscar();


} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE APLICACIONES</h1>
  <div class="row justify-content-center mt-2">
    <form action="/miron_recuperacion/controladores/asignar/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="aplicaciones">Seleccione una aplicacion:</label>
        <select class="form-select" name="asig_san" id="asig_san" required>
          <option value="">Seleccionar aplicacion</option>
          <?php foreach ($aplicaciones as $apps) { ?>
            <option value="<?php echo $apps['SAN_ID']; ?>"><?php echo $apps['SAN_NOMBRE']; ?></option>
          
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="aplicaciones">Seleccione un of_encargado</label>
        <select class="form-select" name="asig_of_encargado" id="asig_of_encargado" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($of_encargado as $of_encargado) { ?>
            <option value="<?php echo $of_encargado['OF_ID']; ?>"><?php echo $of_encargado['OF_NOMBRES']; ?></option>
          <?php } ?>
        </select>
      </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
  </div>
</div>


<?php include_once '../../includes/footer.php'?>