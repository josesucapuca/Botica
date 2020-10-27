<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "InsertarCompra") {
    $Proveedor = $_POST["Proveedor"];
    $Local = $_POST["Local"];
    $EstadoCompra = $_POST["EstadoCompra"];
    $UsuarioCreacion = $_POST["UsuarioCreacion"];
    $CantTotal = $_POST["CantTotal"];
    $consultda = " call InsertarCompra($CantTotal,"
            . "$UsuarioCreacion,"
            . "$Proveedor,"
            . "$Local,"
            . "'$EstadoCompra')";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "InsertarDetalleCompra") {
    $feVenc = $_POST["feVenc"];
    $PrcProd = $_POST["PrcProd"];
    $Cant = $_POST["Cant"];
    $PTotal = $_POST["PTotal"];
    $idC = $_POST["idC"];
    $idPP = $_POST["idPP"];
    $UsuarioCreacion = $_POST["UsuarioCreacion"];
    $consultda = "call InsertarStockCompra('$feVenc',"
            . "$PrcProd,"
            . "$Cant,"
            . "$PTotal,"
            . "$idC,"
            . "$idPP,"
            . "$UsuarioCreacion);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}

mysqli_close($conexion);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

