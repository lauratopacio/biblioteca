<?php 
require('conexion/conexion.php');
	
$db = mysql_select_db($database_Mysql,$Mysql) or die (mysql_error());
//consulta todos la sumas 

// la consulta a la base de datos
$query_autor = "SELECT * FROM  autor ORDER BY  nombre ASC";
//EJECUCION DE LA CONSULTA
$autor = mysql_query($query_autor, $Mysql);
//para que php entienda los datos que envia Mysql
$renglon_autor = mysql_fetch_assoc($autor);
//numero de renglones obtenidos en la consulta
$total_autor = mysql_num_rows($autor);

$query_categoria = "SELECT x.categoria,y.subcategoria, x.pk_categoria FROM categoria x, subcategoria y WHERE x.fk_subcategoria=y.pk_subcategoria ORDER BY x.categoria ASC";
//EJECUCION DE LA CONSULTA
$categoria = mysql_query($query_categoria, $Mysql);
//para que php entienda los datos que envia Mysql
$renglon_categoria = mysql_fetch_assoc($categoria);
//numero de renglones obtenidos en la consulta
$total_categoria = mysql_num_rows($categoria);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>biblioteca</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="img/libros.png" type="image/x-icon">
    <script src="js/d4all.mx.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<style>

  body{   
    background: url('img/fondo.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}
</style>
<body>
		<script src="libro/ajax.js"></script>

  <script>

function myFunction(){
  var n=document.getElementById('bus').value;

  if(n==''){

 document.getElementById("myDiv").innerHTML="";
 document.getElementById("myDiv").style.border="0px";

 document.getElementById("pers").innerHTML="";

 return;
}

loadDoc("q="+n,"libro/proc.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    document.getElementById("myDiv").style.border="1px solid #A5ACB2";

    }else{   
      document.getElementById("myDiv").innerHTML='<img src="load.gif" width="50" height="50" />'; }

  });
}

//-------------------------------

function myFunction2(cod){

document.getElementById("myDiv").innerHTML="";
document.getElementById("myDiv").style.border="0px";

loadDoc("vcod="+cod,"proc2.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("pers").innerHTML=xmlhttp.responseText;
    
    }else{ document.getElementById("pers").innerHTML='<img src="load.gif" width="50" height="50" />'; }

  });
}

</script>
 <div class="container">
	<div class="row">
		<div class="col-12">
			<?php require('libro/menu.php') ?>
		</div>
	</div>

<div class="row">
			
		<form action="libro/registro_libro.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8">
	
		<div class="col-md-6" id="formProdu">
			
				<legend>Agregar libros</legend>
				<div class="form-group col-lg-12">
					 <label>Titulo</label>  
					 <input type="text" maxlength="18	"autofocus="autofocus" name="titulo" value="" class="form-control input-md">    
				</div>
								
				<div class="form-group col-lg-5">
						<label>autor</label>
							<select id="autor" name="autor" class="form-control" Required>
		    						<option value="0">Seleccione un autor</option>
							<?php
							do{
							?>
								<option value="<?php echo $renglon_autor ['pk_autor']?> ">
								<?php echo $renglon_autor ['nombre']; echo " " ; echo $renglon_autor ['apellido_p']; echo " " ; echo $renglon_autor ['apellido_m']; ?>
								</option>
							<?php } while ($renglon_autor= mysql_fetch_assoc($autor));
							?>
		   					</select>				
		   		</div>

				<div class="form-group col-lg-6">
						<label>Categoria/subcategoria</label>
							<select id="categoria" name="categoria" class="form-control" Required>
		    						<option value="0">Seleccione una categoria/subcategoria</option>
							<?php
							do{
							?>
								<option value="<?php echo $renglon_categoria ['pk_categoria']?> ">
								<?php echo $renglon_categoria ['categoria']; echo "/"; echo $renglon_categoria ['subcategoria'];?>
								</option>
							<?php } while ($renglon_categoria= mysql_fetch_assoc($categoria));
							?>
		   					</select>				
		   		</div>

				<div class="form-group col-lg-6">
					<label>Fecha de publicacion</label>  
					<input type="date" name="fecha_publicacion" value="" class="form-control input-md" required>    
		        </div>

			    <legend></legend>
					<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-success btn-block">
				<br>
				<br>

		</div>
		</form>


<div class="col-md-6" id="formProdu">
<legend align="center">Búsqueda de Autores</legend>
<br><br>
        <div class="form-group">

             <label class="col-md-12" for="nombre"></label>  
             <br><br>
                <div class="col-md-6">
                  <input type="text" id="bus" onkeyup="myFunction()" class="form-control" required="required" autofocus="autofocus" placeholder="Introduce el Nombre del autor" />
                  
          </div>
        </div>

      <div class="col-md-12" id="myDiv"></div>  
      </div>  
      
</div>

</div>
</body>

</html>

