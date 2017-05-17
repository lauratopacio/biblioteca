<?php 


include('../conexion/mysqli.php');
		echo $q = $_POST['q'];
		$q=str_replace(" ","%","$q"); // retorna juanito%lopez%soto  

if(isset($_GET[$q]) and !preg_match_all('^ *$',$_GET[$q])){
		
$buscar_usuario="SELECT x.titulo, y.nombre, y.apellido_p, y.apellido_m, x.pk_libro, x.fecha_publicacion FROM libro x, autor y WHERE x.fk_autor=y.pk_autor HAVING y.nombre like '%$q%' ";
$resultado_buscar=$con->query($buscar_usuario);

		
	
		
	}else	{

	$buscar_usuario="SELECT x.titulo, y.nombre, y.apellido_p, y.apellido_m, x.pk_libro, x.fecha_publicacion FROM libro x, autor y WHERE x.fk_autor=y.pk_autor HAVING y.nombre like '%$q%'";
$resultado_buscar=$con->query($buscar_usuario);
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Agregar Proveedor</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
	<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>


    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                       <th>Libro</th>
                        <th>Autor</th>
                        <th>Fecha_publicacion</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
  <?php	while($row=$resultado_buscar->fetch_assoc()){  ?>
	<tr>
			<?php $PK = $row['pk_libro']; ?>
			<td><?php echo $row['titulo']; ?></td>
			<td><?php echo $row['nombre']; echo " ";  echo $row['apellido_p']; echo " "; echo $row['apellido_m']; ?></td>
		<td><?php echo $row['fecha_publicacion']; ?></td>
				

		
	</tr>
	<?php   } ?>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </div>



</body>
</html>