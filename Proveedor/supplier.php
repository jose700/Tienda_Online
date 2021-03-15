<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Author: A.N. Jose Campuzano,
    Student,Uleam">
    <title>Proveedores</title>
    <link rel="shortcut icon" href="/img/Rapicam.png" />
    <!--styleheet-->
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
    <!-- Footer -->
    <div id="headnav">

        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

            <tr>

                <td width="750" align="right">

                    <form action="../Proveedor/result_supplier.php" method="get" ecntype="multipart/data-form">
                        <input type="text" name="query"
                            style="border:1px solid #CCC; color: #333; width:210px; height:30px;"
                            placeholder="Buscar Proveedor..." /><input type="submit" id="btnsearch" value="Buscar"
                            style=cursor:pointer name="search" />
                    </form>
                </td>
                <td width="127" height="37" align="right">
                    <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button"
                            style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; cursor:pointer;border-radius:3px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"
                            value="+ Añadir" /></a>
                </td>
            </tr>

        </table>
        </th>
        </tr>

        <br>

        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%"
                    style="border:1px solid #066; color:#033; border-radius:3px;">

                    <tr>
                        <th colspan="6" align="center" height="55px"
                            style="border-bottom:1px solid #033; background: #066; color:#FFF;">Informacion Proveedor
                        </th>
                    </tr>

                    <tr height="30px">
                        <th style="border-bottom:1px solid #333;"> Nombre de Proveedor </th>
                        <th style="border-bottom:1px solid #333;"> Persona de Contacto </th>
                        <th style="border-bottom:1px solid #333;"> Direccion </th>
                        <th style="border-bottom:1px solid #333;"> Numero Telefonico </th>
                        <th style="border-bottom:1px solid #333;"> Notas </th>
                        <th style="border-bottom:1px solid #333;"> Accion </th>
                    </tr>
                    <!-- Search end here -->
                    <?php
$conexion=mysqli_connect("localhost","root", "","fos_db");
$query="SELECT * FROM supplier";
$result=mysqli_query($conexion, $query);
while ($row=mysqli_fetch_array($result)){?>

                    <tr align="center" style="height:25px">
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['suppliername']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactperson']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['address']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactno']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['note']; ?> </td>
                        <td style="border-bottom:1px solid #333;">


                            <a href="../Proveedor/edit_supplier.php?id=<?php echo md5($row['id']);?>"><input
                                    type="button" value="Editar"
                                    style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;cursor:pointer"></a>/<a
                                href="../Proveedor/delete_supplier.php?id=<?php echo md5($row['id']);?>"><input
                                    type="button" value="Eliminar"
                                    style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;cursor:pointer"></a>

                        </td>
                    </tr>
                    <?php
}?>

                </table>

            </td>
        </tr>
        </table>
        <br><br><br>
        <div id="bdcontainer"></div>

        <div id="">
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
                            <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">
                                Agregar Proveedor </p>
                        </div>
                        <br>
                        <form action="../Proveedor/add_supplier.php" method="POST">
                            <table border="0" align="center">

                                <tr>
                                    <td align="right">Nombre Proveedor:</td>
                                    <td><input type="text" id="txtbox" name="suppliername" placeholder="Proveedor"
                                            required><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Persona de contacto:</td>
                                    <td><input type="text" id="txtbox" name="contactperson" placeholder="Contacto"
                                            required><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Direccion:</td>
                                    <td><input type="text" id="txtbox" name="address" placeholder="Direccion"
                                            required><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Numero Telefonico:</td>
                                    <td><input type="text" id="txtbox" name="contactno" maxlength="11"
                                            placeholder="numero" required><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Notas:</td>
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