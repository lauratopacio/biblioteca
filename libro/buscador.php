<?php 

include("../conexion/mysqli.php");


 
$result="SELECT x.titulo, y.nombre, y.apellido_p, y.apellido_m, x.pk_libro, x.fecha_publicacion FROM libro x, autor y WHERE x.fk_autor=y.pk_autor";
$productor=$con->query($result);
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Proveedor</title>
  <meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>

  
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php require('menu.php') ?>
      </div>
    </div>
<br>

   
<div class="container">    
<div class="col-md-6">
  <script src="ajax.js"></script>

  <script>

function myFunction(){
  var n=document.getElementById('bus').value;

  if(n==''){

 document.getElementById("myDiv").innerHTML="";
 document.getElementById("myDiv").style.border="0px";

 document.getElementById("pers").innerHTML="";

 return;
}

loadDoc("q="+n,"proc.php",function(){

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
</div>

  <legend align="center">Búsqueda de Autores</legend>

        <div class="form-group">

             <label class="col-md-12" for="nombre"></label>  
             <br><br>
                <div class="col-md-12">
                  <input type="text" id="bus" onkeyup="myFunction()" class="form-control" required="required" autofocus="autofocus" placeholder="Introduce el Nombre del proveedor" />
                  
          </div>
        </div>

<div class="col-md-12" id="myDiv"></div>  
        
</div>



</body>
</html>



























