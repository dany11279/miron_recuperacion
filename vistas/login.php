<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleloginemb.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>
<body>
<center>
<!-- Contenedor formulario -->
<section class="text-center"></section>
   <div class="container py-4">
     <div class="align-items-center">
       <div class="col-lg-8 mb-5">
         <div class="card cascading-right" style="background: hsla(188, 61%, 64%, 0.462);
             backdrop-filter: blur(20px);">
           <div class="card-body p-5 shadow-5 text-center">
             <h2 class="fw-bold mb-5">Control de sancioneses del Comando de Informática y Tecnología</h2>
             <form>
               <!-- El formulario para registrarse -->
               <div class="row">
                  <!-- usuario input -->
                 <div class="form-outline mb-4">
                   <div class="form-outline">
                     <input type="text" id="name" class="form-control" required />
                     <label class="form-label" for="Name" >Usuario</label>
                   </div>
                 </div>
                
               <!-- catalogo input -->
               <div class="form-outline mb-4">
                 <input type="number" id="number" class="form-control" required/>
                 <label class="form-label" for="number">Catálogo</label>
               </div>
 
               <!-- Contraseña input -->
               <div class="form-outline mb-4">
                 <input type="password" id="password" class="form-control" required />
                 <label class="form-label" for="password">Contraseña</label>
               </div>
               <!-- Redireccion al Inicio -->
               <a href="/miron_recuperacion/vistas/grados/index.php" class="btn btn-primary btn-block mb-4" >Ingresar</a>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
</center>
</body>
</html>
