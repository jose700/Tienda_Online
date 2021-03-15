<?php
session_start();
$conexion=mysqli_connect("localhost","root", "","fos_db");

$suppliername=$_POST['suppliername'];
$contactperson=$_POST['contactperson'];
$address=$_POST['address'];
$contactno=$_POST['contactno'];
$note=$_POST['note'];

	$register="INSERT INTO supplier(suppliername,contactperson,address,contactno,note) VALUES('$suppliername','$contactperson','$address','$contactno','$note')" or die("error".mysqli_errno($conexion));
	$result=mysqli_query($conexion,$register);
		header('location:../admin/index.php');

mysqli_close($conexion);
?>
