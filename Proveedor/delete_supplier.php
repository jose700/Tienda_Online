<?php
	$conexion=mysqli_connect("localhost","root", "","fos_db");
	$id = $_GET['id'];
	$sql = "Delete from supplier where md5(id) = '$id'";
	if($conexion->query($sql) === true){
		echo "Se elimino correctamente";
		header('location:../admin/index.php');
	}else{
		echo "Lo sentimos ocurrio un error ";
	}

	$db_link->close();
?>