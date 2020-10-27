<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarUsuario") {
    $Usuario = $_POST["Usuario"];
    $id_Empleado = $_POST["id_Empleado"];
    $password = $_POST["password"];
    $correo = $_POST["correo"];
    $Estado = $_POST["Estado"];
    $Nivel = $_POST["Nivel"];
    $UsuarioCreacion = $_POST["UsuarioCreacion"];
    $consultda = "";
    if ($correo === "") {
        $consultda = " call InsertarUsuario('$Usuario',"
                . "'$password',"
                . "'$Nivel',"
                . "'$Estado',"
                . "null,"
                . "$id_Empleado,"
                . "$UsuarioCreacion)";
    } else {
        $consultda = " call InsertarUsuario('$Usuario',"
                . "'$password',"
                . "'$Nivel',"
                . "'$Estado',"
                . "'$correo',"
                . "$id_Empleado,"
                . "$UsuarioCreacion)";
    }
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarEmpleado") {
    $id_Emp = $_POST["id"];
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

    $id_Usu = $_POST["id"];
    $consultda = "call ListaUsuarioById($id_Usu);";
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
    $id_Usuario = $_POST["id_Usuario"];
    $UsuarioMod = $_POST["UsuarioMod"];
    $passwordMod = $_POST["passwordMod"];
    $correoMod = $_POST["correoMod"];
    $EstadoMod = $_POST["EstadoMod"];
    $NivelMod = $_POST["NivelMod"];
    $UsuarioModificacion = $_POST["UsuarioModificacion"];
    $consulta = " call ModificarUsuario($id_Usuario,"
            . "'$UsuarioMod',"
            . "'$passwordMod',"
            . "'$NivelMod',"
            . "'$EstadoMod',"
            . "'$correoMod',"
            . "$UsuarioModificacion)";
    $var = mysqli_query($conexion, $consulta);
    //echo $consultda;
    echo json_encode($var);
}
if ($opcion === "ActivarUsuario") {
    //echo 'asa';
    $ModUsu = $_POST["id"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call ActivarUsuario($ModUsu,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "DesactivarUsuario") {
    $ModUsu = $_POST["id"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call DesactivarUsuario($ModUsu,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
mysqli_close($conexion);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

