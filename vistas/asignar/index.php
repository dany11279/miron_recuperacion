<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
require '../../modelos/sanciones.php';
require '../../modelos/of_encargado.php';
    try {
      
        $app = new sanciones();
        
        $sanciones = $app->buscar();
     //var_dump($sanciones);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }


try {
  
    $progra = new of_encargado();
 
    
    $progras = $progra->buscar();
    //var_dump($progras);

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE SANCIOENES</h1>
  <div class="row justify-content-center mt-2">
    <form action="/miron_recuperacion/controladores/asignar/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="sanciones">Seleccione una sancion:</label>
        <select class="form-select" name="asig_san" id="asig_san" required>
          <option value="">Seleccionar sancion</option>
          <?php foreach ($sanciones as $apps) { ?>
            <option value="<?php echo $apps['SAN_ID']; ?>"><?php echo $apps['SAN_NOMBRE']; ?></option>
          
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="sanciones">Seleccione un of_encargado</label>
        <select class="form-select" name="asig_of_encargado" id="asig_of_encargado" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($encargados as $apps) { ?>
            <option value="<?php echo $apps['OF_ID']; ?>"><?php echo $apps['NOMBRE']; ?></option>
          <?php } ?>
        </select>
      </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
  </div>
</div>


<?php include_once '../../includes/footer.php'?>