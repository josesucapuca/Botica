<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarProductoPresentacion") {
    $Producto = $_POST["Producto"];
    $Estado = '1';
    $Presentacion = $_POST["Presentacion"];
    $PrecioCompra = $_POST["PrecioCompra"];
    $PrecioVenta = $_POST["PrecioVenta"];
    $CantidadUnidades = $_POST["CantidadUnidades"];
    $UsuarioCreacion = $_POST["Usuariocreacion"];
    $consultda = " call  InsertarProductoPresentacion($Producto,$Presentacion,'$Estado',$PrecioCompra,$PrecioVenta,$CantidadUnidades,$UsuarioCreacion)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "ListarProductoPresentacionById") {
    $id = $_POST["id"];
    $consultda = "call  ListaProductoPresentacionById($id);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ListaProductoProveedorByProdPres") {
    $idpo = $_POST["idp"];
    $idpe = $_POST["idpr"];
    $consultda = "call  ListaProductoProveedorByProdPres($idpo,$idpe);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ListaProductoPresentacionIdProducto") {
    $id = $_POST["id"];
    $consultda = "call  ListaProductoPresentacionIdProducto($id);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ModificarProductoPresentacion") {    //echo 'asa';
    $idProPre = $_POST["idProductoPresentacion"];
    $Producto = $_POST["ProductoMod"];
    $Estado = '1';
    $Presentacion = $_POST["PresentacionMod"];
    $PrecioCompra = $_POST["PrecioCompraMod"];
    $PrecioVenta = $_POST["PrecioVentaMod"];
    $CantidadUnidades = $_POST["CantidadUnidadesMod"];
    $UsuarioModificacion = $_POST["UsuarioModificacion"];
    $consultda = " call  ModificarProductoPresentacion($idProPre,'$Estado',$PrecioCompra,"
            . "$PrecioVenta"
            . ",$CantidadUnidades,$UsuarioModificacion)";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "RestaurarProductoPresentacion") {
    $id_Producto = $_POST["id_Producto"];
    $id_Usuario = $_POST["id_Usuario"];
    $consultda = "call ActivarProducto($id_Usuario,$id_Producto);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "EliminarProductoPresentacion") {
    //echo 'asa';
    $id_Producto = $_POST["id"];
    $id_Usuario = $_POST["id_US"];
    $consultda = "call EliminarProductoPresentacion($id_Producto,$id_Usuario);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
mysqli_close($conexion);
