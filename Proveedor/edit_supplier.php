<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Proveedor</title>
</head>

<link rel="stylesheet" type="text/css" href="../css/css1.css">
<script>
	function toggle_visibility(id){
		var e = document.getElementById(id);
		if(e.style.display=='block')
			e.style.display = 'none';
		else
			e.style.display = 'block';
		}
</script>

<body>

<div id="container">
<div id="header">



<!-- Footer -->
<div id = "headnav"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>

	<td width="669" height="62">

      </td>
      
      <td width="13">
      <table border="0" cellspacing="0" cellpadding="0">
      	<tr>
        	<td align="left" style="color:#FFF">
  
            </td>
        </tr>
      </table>
      </td>

</tr>
</table>
</div>
<br>

<div id="footer">

</div>

<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="750" align="right"><form action="../Proveedor/result.php" method="get" ecntype="multipart/data-form">
        
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search supplier..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form></td>
        
        <td width="127" height="37" align="right">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Añadir" /></a></td>
      </tr>
    
    </table></th>
  </tr>
  
  <div id="popup-box2" class="popup-position1">
<div id="popup-wrapper1">
<div id="popup-container1">
    <div id="popup-head-color2">
    <br>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Editar Proveedor </p>
    </div>

<?php

$conexion=mysqli_connect("localhost","root", "","fos_db");

$id = $_GET['id'];
$view = "SELECT * from supplier where md5(id) = '$id'";
$result = $conexion->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$suppliername = $_POST['suppliername'];
	$contactperson = $_POST['contactperson'];
	$address = $_POST['address'];
	$contactno = $_POST['contactno'];
	$note = $_POST['note'];

	$insert = "UPDATE supplier set suppliername = '$suppliername', contactperson = '$contactperson', address = '$address', contactno = '$contactno', note = '$note' where md5(id) = '$ID'";
	
	if($conexion->query($insert)== TRUE){

			echo "Datos actualizado correctamente";
			header('location:../admin/index.php');			
	}else{

		echo "Error alactualizar dato" . $conn->error;
    header('location:../admin/index.php');
	}
	
	$conexion->close();
}

?>
   
    <br>
    <form action="" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Nombre Proveedor:</td>
    <td><input type="text" id="txtbox" name="suppliername" placeholder="Proveedor" value="<?php echo $row['suppliername'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Persona de contacto:</td>
    <td><input type="text" id="txtbox" name="contactperson" placeholder="Contacto" value="<?php echo $row['contactperson'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Dirección:</td>
    <td><input type="text" id="txtbox" name="address" placeholder="Direccion" value="<?php echo $row['address'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Numero Telefonico:</td>
    <td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="Telefono" value="<?php echo $row['contactno'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Notas:</td>
    <td><input type="text" id="txtbox" name="note" placeholder="Notas" value="<?php echo $row['note'];?>" required><br></td>
    </tr>    
    <br>
    <tr align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" name="update" id="btnnav" value="Actualizar"></form>
    <a href="supplier.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"></a>
    
    </td>
    </tr>
    
    </table>

</div>
</div>
</div>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #066; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Products 	</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Nombre Proveedor </th>
        <th style="border-bottom:1px solid #333;"> Persona de Contacto </th>
        <th style="border-bottom:1px solid #333;"> Direccion </th>
        <th style="border-bottom:1px solid #333;"> Número Telefonico </th>
        <th style="border-bottom:1px solid #333;"> Notas </th>
        <th style="border-bottom:1px solid #333;"> Accion </th>
      </tr>
      
       <?php
$conexion=mysqli_connect("localhost","root", "","fos_db");
$query="SELECT * FROM supplier";
$result=mysqli_query($conexion, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" height="25px;">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['suppliername']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactperson']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['address']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactno']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['note']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="../Proveedor/edit_supplier.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a href="../Proveedor/delete_supplier.php"><input type="button" value="Eliminar" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
        
        </td>
        </td>
      </tr>
   <?php
}?>
      
    </table>
    
  </td>
  </tr>
</table>

</div>

</body>
</html>
