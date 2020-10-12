<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarPresentacion") {
    $Presentacion = $_POST["Presentacion"];
    $Estado_Presentacion = $_POST["Estado_Presentacion"];
    $Usuariocreacion = $_POST["Usuariocreacion"];
    $consultda = " call InsertarPresentracion('$Presentacion','$Estado_Presentacion',$Usuariocreacion)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarPresentacion") {
    $consultda = "call ListaPresentacion;";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ListarPresentacionbyid") {
    
    $Preid = $_POST["id"];
    $consultda = "call ListaPresentacionById($Preid);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    
    echo json_encode($arr);
}
if ($opcion === "ModificarPresentacion") {
    //echo 'asa';
    $ModidPresentacion = $_POST["id_Pre"];
    $ModPresentacion = $_POST["ModPresentacion"];
    $ModEstadoPresentacion = $_POST["ModEstado_Presentacion"];
    $ModUsuMod = $_POST["UsuarioModificacion"];
    $consultda = "call ModificarPresentacion($ModidPresentacion,'$ModPresentacion','$ModEstadoPresentacion',$ModUsuMod);";
    $var = mysqli_query($conexion, $consultda);
    //echo $consultda;
    echo json_encode($var);
}
if ($opcion === "ActivarPresentacion") {
    //echo 'asa';
    $ModCatid = $_POST["idPre"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call ActivarPresentacion($ModCatid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "DesactivarPresentacion") {
    //echo 'asa';
    $ModPreid = $_POST["idPre"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call DesactivarPresentacion($ModPreid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
    echo $consultda;
}
mysqli_close($conexion);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

