<?php
include_once '../Factory/ConexionOperacion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$opcion = $_POST["opc"];

if ($opcion === "ListarDistrito") {
    $consultda = "call ListaDistrito;";
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