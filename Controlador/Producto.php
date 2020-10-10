<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarProducto") {
    echo 'asa';
    $Producto = $_POST["Producto"];
    $Estado = $_POST["Estado"];
    $Categoria= $_POST["Categoria"];
    $Presentacion = $_POST["Presentacion"];
    $Local = $_POST["Local"];
    $Proveedor = $_POST["Proveedor"];
    $PrecioCompra = $_POST["PrecioCompra"];
    $PrecioVenta = $_POST["PrecioVenta"];
    $PrecioCompraPresentacion = $_POST["PrecioCompraPresentacion"];
    $PrecioVentaPresentacion = $_POST["PrecioVentaPresentacion"];
    $UsuarioCreacion = $_POST["Usuariocreacion"];
    $consultda = " call  InsertarProducto('$Producto','$Estado',$UsuarioCreacion,$Presentacion,$Categoria,$Local,$Proveedor,$PrecioCompra,$PrecioVenta,$PrecioCompraPresentacion,$PrecioVentaPresentacion)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarCategoria") {
    $consultda = "call ListaCategoria;";
    $var = mysqli_query($conexion, $consultda);
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
mysqli_close($conexion);
