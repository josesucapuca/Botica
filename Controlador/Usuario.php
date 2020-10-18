<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarUsuario") {
    $NombreEmpleado = $_POST["NombreEmpleado"];
    $ApellidoEmpleado = $_POST["ApellidoEmpleado"];
    $CargoEmpleado = $_POST["CargoEmpleado"];
    $EstadoEmpleado = $_POST["EstadoEmpleado"];
    $EdadEmpleado = $_POST["EdadEmpleado"];
    $DireccionEmpleado = $_POST["DireccionEmpleado"];
    $TelefonoEmpleado = $_POST["TelefonoEmpleado"];
    $CelularEmpleado = $_POST["CelularEmpleado"];
    $LocalEmpleado = $_POST["LocalEmpleado"];
    $DistritoEmpleado = $_POST["DistritoEmpleado"];
    $FechaIngreso = $_POST["FechaIngreso"];
    $ClaveEmpleado = $_POST["ClaveEmpleado"];
    $SexoEmpleado = $_POST["SexoEmpleado"];
    $Usuariocreacion = $_POST["Usuariocreacion"];
    $consultda = " call InsertarEmpleado('$NombreEmpleado',"
            . "'$ApellidoEmpleado',"
            . "'$DireccionEmpleado',"
            . "'$CargoEmpleado',"
            . "'$EdadEmpleado',"
            . "'$TelefonoEmpleado',"
            . "'$CelularEmpleado',"
            . "'$FechaIngreso',"
            . "'$EstadoEmpleado',"
            . "$Usuariocreacion,"
            . "$LocalEmpleado,"
            . "$DistritoEmpleado,"
            . "'$ClaveEmpleado',"
            . "'$SexoEmpleado')";
    echo '$consultda';
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarEmpleado") {
    $id_Emp=$_POST["id"];
    $consultda = "call ListaEmpleadoByEmpresa($id_Emp);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ListarUsuarioById") {

    $EmpUs = $_POST["id"];
    $consultda = "call ListarUsuarioById($EmpUs);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ModificarUsuario") {
    //echo 'asa';
    $EmpId = $_POST["id_Emp"];
    $NombreEmpleado = $_POST["NombreEmpleadoMod"];
    $ApellidoEmpleado = $_POST["ApellidoEmpleadoMod"];
    $CargoEmpleado = $_POST["CargoEmpleadoMod"];
    $EstadoEmpleado = $_POST["EstadoEmpleadoMod"];
    $EdadEmpleado = $_POST["EdadEmpleadoMod"];
    $DireccionEmpleado = $_POST["DireccionEmpleadoMod"];
    $TelefonoEmpleado = $_POST["TelefonoEmpleadoMod"];
    $CelularEmpleado = $_POST["CelularEmpleadoMod"];
    $LocalEmpleado = $_POST["LocalEmpleadoMod"];
    $DistritoEmpleado = $_POST["DistritoEmpleadoMod"];
    $FechaIngreso = $_POST["FechaIngresoMod"];
    $ClaveEmpleado = $_POST["ClaveEmpleadoMod"];
    $SexoEmpleado = $_POST["SexoEmpleadoMod"];
    $FechaSalida=$_POST["FechaSalidaMod"];
    $UsuarioModificacion = $_POST["UsuarioModificacion"];
    $consulta = " call ModificarEmpleado('$NombreEmpleado',"
            . "'$ApellidoEmpleado',"
            . "'$DireccionEmpleado',"
            . "'$CargoEmpleado',"
            . "'$EdadEmpleado',"
            . "'$TelefonoEmpleado',"
            . "'$CelularEmpleado',"
            . "'$FechaIngreso',"
            . "'$EstadoEmpleado',"
            . "$UsuarioModificacion,"
            . "$LocalEmpleado,"
            . "$DistritoEmpleado,"
            . "'$ClaveEmpleado',"
            . "'$SexoEmpleado',"
            . "$EmpId,"
            . "'$FechaSalida')";
    $var = mysqli_query($conexion, $consulta);
    //echo $consultda;
    echo json_encode($var);
}
if ($opcion === "ActivarUsuario") {
    //echo 'asa';
    $ModEmpid = $_POST["id"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call ActivarEmpleado($ModEmpid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "DesactivarUsuario") {
    //echo 'asa';
    $ModEmpid = $_POST["id"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call DesactivarEmpleado($ModEmpid,$UsuMod);";
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

