<?php

include_once '../Factory/ConexionOperacion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$opcion = $_POST["opc"];

if ($opcion === "ListarProveedor") {
    $consultda = "call ListaProveedor;";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ListarProveedorByIdEmpresa") {
    $id_Emp=$_POST["id"];
    $consultda = "call ListaProveedorByEmpresa($id_Emp);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "IngresarProveedor") {
    $Proveedor = $_POST["Proveedor"];
    $Es_Proveedor = $_POST["Estado_Proveedor"];
    $Local = $_POST["Local"];
    $Distrito = $_POST["Distrito"];
    $Direccion = $_POST["Direccion"];
    $Telefono = $_POST["Telefono"];
    $Celular = $_POST["Celular"];
    $UsuarioCrea= $_POST["Usuariocreacion"];
    $consultda = " call InsertarProveedor('$Proveedor','$Es_Proveedor',$UsuarioCrea,"
            . "'$Telefono','$Direccion','$Celular',$Distrito,$Local)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarProveedorbyid") {
    
    $Proid = $_POST["id"];
    $consultda = "call ListaProveedorById($Proid);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ModificarProveedor") {
    //echo 'asa';
    $idProveedor = $_POST["id_Pro"];
    $Proveedor = $_POST["ModProveedor"];
    $Es_Proveedor = $_POST["ModEstado_Proveedor"];
    $Local = $_POST["LocalMod"];
    $Distrito = $_POST["DistritoMod"];
    $Direccion = $_POST["DireccionMod"];
    $Telefono = $_POST["TelefonoMod"];
    $Celular = $_POST["CelularMod"];
    $UsuarioMod= $_POST["UsuarioModificacion"];
    $consultda = "call ModificarProveedor($idProveedor,'$Proveedor','$Es_Proveedor',$UsuarioMod,"
            . "'$Telefono','$Direccion','$Celular',$Distrito,$Local)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ActivarProveedor") {
    //echo 'asa';
    $ModProid= $_POST["idPro"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call ActivarProveedor($ModProid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "DesactivarProveedor") {
    //echo 'asa';
    $ModProid = $_POST["idPro"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call DesactivarProveedor($ModProid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
    echo $consultda;
}
mysqli_close($conexion);

