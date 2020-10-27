<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarClienteVenta") {
    $CC = $_POST["CC"];
    $TC = $_POST["TC"];
    $TV = $_POST["TV"];
    $CL = $_POST["CL"];
    $NC = $_POST["NC"];
    $AC = $_POST["AC"];
    $DC = $_POST["DC"];
    $SC = $_POST["SC"];
    $RC = $_POST["RC"];
    $CT = $_POST["CT"];
    $UC = $_POST["UC"];
    $LC = $_POST["LC"];
    $consultda = " call IngresarClienteVenta('$CC',"
            . "'$TC','$TV',$CL,'$NC','$AC','$DC','$SC','$RC',$CT,"
            . "$UC,$LC)";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "IngresarDetalleVenta") {
    $PP = $_POST["PP"];
    $CP = $_POST["CP"];
    $PT = $_POST["PT"];
    $IV = $_POST["IV"];
    $IPP = $_POST["IPP"];
    $consultda = " call IngresarDetalleVenta($PP,$CP,$PT,$IV,$IPP)";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}

mysqli_close($conexion);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

