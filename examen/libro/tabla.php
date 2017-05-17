<?php 

include("../conexion/mysqli.php");


 
$result="SELECT x.titulo, y.nombre, y.apellido_p, y.apellido_m, x.pk_libro, x.fecha_publicacion FROM libro x, autor y WHERE x.fk_autor=y.pk_autor";
$productor=$con->query($result);
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Catálogo</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
   
     <link rel="stylesheet" type="text/css" href="../bootstrap/css/menuPaginas.css" media="screen" charset="utf-8">
    <script src="../js/d4all.mx.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
         
  <div class="row destacados">
      <?php 
while($row=$productor->fetch_assoc()){ 
                 ?>
    <div class="col-md-4">
        <div>
         <h3><?php echo 'Titulo: '; echo $row['titulo']; ?></h3>
 <h3><?php echo 'Autor: '; $row['nombre']; echo " "; echo $row['apellido_p']; echo " ";  echo $row['apellido_m'];?></h3>
 <h3><?php echo "Fecha de publicacion: ";echo $row['fecha_publicacion']; ?></h3>
        
      </div>
    </div>
    <?php   } ?>
  </div>

</body>
</html>



























