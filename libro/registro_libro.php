<?php 

	require('../conexion/mysqli.php');
	
	$titulo=$_POST['titulo'];
	//poner el nombre como estan en el input,y $ las bariables inventadas
	//pero que coinsida con lo que es 
	$autor=$_POST['autor'];
	$fecha_publicacion=$_POST['fecha_publicacion'];
	echo $categoria=$_POST['categoria'];
	//poner tal cual como esta en la base de datos 
	//y en el values poner las mismas variables que pusimos arriva 
	
$query="INSERT INTO libro(pk_libro, titulo, fk_autor, fecha_publicacion)
VALUES (NULL,'$titulo','$autor','$fecha_publicacion')";
	$resultado=$con->query($query);
	
 $buscar_libro="SELECT max(pk_libro) as pk FROM libro";
  $resultado_buscar=$con->query($buscar_libro);
  while($row=$resultado_buscar->fetch_assoc()) {
  $PK= $row['pk']; 
  }


	$guardar_categoria="INSERT INTO libro_categoria(pk_libro_categoria, fk_libro, fk_categoria)
VALUES (NULL,'$PK','$categoria')";
	
	$resultado_guardar_cat=$con->query($guardar_categoria);
	
?>

<html>
	<head>
		<title>Guardar libro</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0){ ?>
				<?php echo "
<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=../index.php'>
         <script>
             alert('Datos insertados con exito');
         </script> 
    </body>
    </html>
				" ?>
				<?php }else{ ?>
				<?php echo "
<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-proveedor.php'>
         <script>
             alert('Datos insertados con exito');
         </script> 
    </body>
    </html>
				" ?>	
			<?php	} ?>		
			
			
		</center>
	</body>
	</html>	