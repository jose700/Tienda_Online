<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Busqueda</title>
</head>

<link rel="stylesheet" type="text/css" href="../css/css1.css">
<script>
function toggle_visibility(id) {
    var e = document.getElementById(id);
    if (e.style.display == 'block')
        e.style.display = 'none';
    else
        e.style.display = 'block';
}
</script>

<body>
    <?php include('../admin/header.php'); 
 ?>
    <!-- Footer -->
    <div id="headnav">
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

    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
            <td width="750" align="right">

                <form action="../Proveedor/result_supplier.php" method="get" ecntype="multipart/data-form">
                    <input type="text" name="query"
                        style="border:1px solid #CCC; color: #333; width:210px; height:30px;"
                        placeholder="Search supplier..." /><input type="submit" id="btnsearch" value="Buscar"
                        name="search" />
                </form>

            </td>

            <td width="127" height="37" align="right">
                <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button"
                        style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"
                        value="+Añadir" /></a>
            </td>
        </tr>

    </table>
    </th>
    </tr>

    <br>

    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%"
                style="border:1px solid #066; color:#033;">

                <tr>
                    <th colspan="7" align="center" height="55px"
                        style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Supplier Information Table
                    </th>
                </tr>

                <tr height="30px">
                    <th style="border-bottom:1px solid #333;"> Supplier Name </th>
                    <th style="border-bottom:1px solid #333;"> Contact Person </th>
                    <th style="border-bottom:1px solid #333;"> Address </th>
                    <th style="border-bottom:1px solid #333;"> Contact No. </th>
                    <th style="border-bottom:1px solid #333;"> Note </th>
                    <th style="border-bottom:1px solid #333;"> Accion </th>
                </tr>

                <?php
			$conexion=mysqli_connect("localhost","root", "","fos_db");
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from supplier where suppliername like '%$query%' or contactperson like '%$query%'";

						$result = $conexion->query($sql);
						if($result->num_rows > 0){
							while($row1 = $result->fetch_array()){
		
						?>
                <tr align="center" style="height:25px">
                    <td style="border-bottom:1px solid #333;"> <?php echo $row1['suppliername']; ?> </td>
                    <td style="border-bottom:1px solid #333;"> <?php echo $row1['contactperson']; ?> </td>
                    <td style="border-bottom:1px solid #333;"> <?php echo $row1['address']; ?> </td>
                    <td style="border-bottom:1px solid #333;"> <?php echo $row1['contactno']; ?> </td>
                    <td style="border-bottom:1px solid #333;"> <?php echo $row1['note']; ?> </td>
                    <td style="border-bottom:1px solid #333;">


                        <a href="../Proveedor/edit_supplier.php?id=<?php echo md5($row1['id']);?>"><input type="button"
                                value="Editar"
                                style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a
                            href="delete_supplier.php?id=<?php echo md5($row1['id']);?>"><input type="button"
                                value="Eliminar"
                                style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>

                    </td>
                </tr>
                <?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$conexion->close();
				?>
            </table>
        </td>
    </tr>
    </table>
    <br><br><br>
    <div id="bdcontainer"></div>



    </div>


    <div id="popup-box1" class="popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <div id="popup-head-color2">
                    <p
                        style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;">
                        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')">
                            <font color="#FFF"> X </font>
                        </a>
                    </p>
                    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item
                        Form </p>
                </div>
                <br>
                <form action="../Proveedor/add_supplier.php" method="POST">
                    <table border="0" align="center">

                        <tr>
                            <td align="right">Supplier Name:</td>
                            <td><input type="text" id="txtbox" name="suppliername" placeholder="suppliername"
                                    required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Conatct Person:</td>
                            <td><input type="text" id="txtbox" name="contactperson" placeholder="contactperson"
                                    required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Address:</td>
                            <td><input type="text" id="txtbox" name="address" placeholder="address" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Numero Telefonico:</td>
                            <td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="contactno"
                                    required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Note:</td>
                            <td><input type="text" id="txtbox" name="note" placeholder="note" required><br></td>
                        </tr>

                        <br>
                        <tr align="left">
                            <td>&nbsp; </td>
                            <td><input type="SUBMIT" id="btnnav" value="Enviar"></a></td>
                        </tr>

                    </table>
                </form>

            </div>
        </div>
    </div>

</body>

</html>