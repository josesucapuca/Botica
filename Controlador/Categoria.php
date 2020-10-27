<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opcCat"];

if ($opcion === "IngresarCategoria") {
    $id_Emp = $_POST["id_Empresa"];
    $Categoria = $_POST["Categoria"];
    $Estado_Categoria = $_POST["Estado_Categoria"];
    $Usuariocreacion = $_POST["Usuariocreacion"];
    //echo $Categoria.$Estado_Categoria.$Usuariocreacion;
    $consultda = " call InsertarCategoria('$Categoria','$Estado_Categoria',$Usuariocreacion,$id_Emp)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarCategoriaByEmpresa") {
    //$consultda = "";
    $ids = $_POST["id"];
    $var = $conexion->query("call ListaCategoriaByEmpresa($ids);");
    //$data = $var->fetch_object();
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ListarCategoriabyid") {
    $Catid = $_POST["id"];
    $consultda = "call ListaCategoriabyId($Catid);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ModificarCat") {
    //echo 'asa';
    $ModCatid = $_POST["id_Cat"];
    $ModCategoria = $_POST["ModCategoria"];
    $ModEstadoCategoria = $_POST["ModEstado_Categoria"];
    $ModUsuMod = $_POST["UsuarioModificacion"];
    $consultda = "call ModificarCategoria('$ModCategoria','$ModEstadoCategoria',$ModUsuMod,$ModCatid);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "DesactivarCategoria") {
    //echo 'asa';
    $ModCatid = $_POST["idCat"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call DesactivarCategoria($ModCatid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ActivarCategoria") {
    //echo 'asa';
    $ModCatid = $_POST["idCat"];
    $UsuMod = $_POST["id_UM"];
    $consultda = "call ActivarCategoria($ModCatid,$UsuMod);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
mysqli_close($conexion);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

