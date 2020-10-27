<?php

include_once '../Factory/ConexionOperacion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$opcion = $_POST["opcion"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$Empresa = $_POST["Empresa"];
//echo $usuario.$password.$Empresa;
if ($opcion === "validarUsuario") {
    $consultda = " call ListaLogueo('$usuario','$password','$Empresa')";
    $var = mysqli_query($conexion, $consultda);
    $data = $var->fetch_object();
    if (json_encode($data) !== null) {
        session_start();
        $_SESSION["Usuario"] = $data->usuario;
        $_SESSION["id_Usuario"] = $data->id_Usuario;
        $_SESSION["Nivel_Usuario"] = $data->Nivel_Usuario;
        $_SESSION["id_Empleado"] = $data->id_Empleado;
        $_SESSION["Empleado"] = $data->Empleado;
        $_SESSION["id_local"] = $data->id_Local;
        $_SESSION["No_Local"] = $data->No_Local;
        $_SESSION["id_Empresa"] = $data->id_Empresa;
        $_SESSION["No_Empresa"] = $data->No_Empresa;
        echo json_encode($data);
    } else {
        echo json_encode($data);
    }
}
if ($opcion === "SalirSesion") {
    session_start();
    session_destroy();
}

//mysqli_close($conexion);
