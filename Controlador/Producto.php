<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarProducto") {
    $Producto = $_POST["Producto"];
    $Estado = $_POST["Estado"];
    $Categoria = $_POST["Categoria"];
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
if ($opcion === "ListarProductobyid") {
    $Prodid = $_POST["id_Prd"];
    $consultda = "call ListaProductobyId($Prodid);";
    $var = mysqli_query($conexion, $consultda);
    $arr = array();
    if (mysqli_num_rows($var) != 0) {
        while ($row = mysqli_fetch_assoc($var)) {
            $arr[] = $row;
        }
    }
    echo json_encode($arr);
}
if ($opcion === "ModificarProducto") {    //echo 'asa';
    $Producto = $_POST["ProductoMod"];
    $Estado = $_POST["Estado_ProductoMod"];
    $id_Producto = $_POST["idProducto"];
    $Categoria = $_POST["CategoriaMod"];
    $Presentacion = $_POST["PresentacionMod"];
    $Local = $_POST["LocalMod"];
    $Proveedor = $_POST["ProveedorMod"];
    $PrecioCompra = $_POST["PrecioCompraMod"];
    $PrecioVenta = $_POST["PrecioVentaMod"];
    $PrecioCompraPresentacion = $_POST["PrecioCompraPresentacionMod"];
    $PrecioVentaPresentacion = $_POST["PrecioVentaPresentacionMod"];
    $UsuarioModificacion = $_POST["UsuarioModificacion"];
    $consultda = " call  ModificarProducto($id_Producto,'$Producto','$Estado',"
            . "$UsuarioModificacion,$Presentacion,$PrecioCompra,$PrecioVenta"
            . ",$PrecioCompraPresentacion,$PrecioVentaPresentacion,$Local,$Proveedor,$Categoria)";
    $var = mysqli_query($conexion, $consultda);
    //echo ($consultda);
    echo json_encode($var);
}
if ($opcion === "ActivarProducto") {
    //echo 'asa';
    $id_Producto = $_POST["id_Producto"];
    $id_Usuario = $_POST["id_Usuario"];
    $consultda = "call ActivarProducto($id_Usuario,$id_Producto);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "DesactivarProducto") {
    //echo 'asa';
    $id_Producto = $_POST["id_Producto"];
    $id_Usuario = $_POST["id_Usuario"];
    $consultda = "call DesactivarProducto($id_Usuario,$id_Producto);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
mysqli_close($conexion);
