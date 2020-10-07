<?php

require '../DAO/ProductoDAO.php';
$opcion = $_POST["opc"];
$Producto = $_POST["Producto"];
$Es_Producto = $_POST["Estado_Producto"];
$usu_Creacion = $_POST["password"];
$id_Presentacion = $_POST["Presentacion"];
$id_Categoria = $_POST["Categoria"];
$id_Local = $_POST["Local"];
$id_Proveedor = $_POST["Proveedor"];
$Precio_Compra = $_POST["PrecioCompra"];
$Precio_Venta = $_POST["PrecioVenta"];
$Precio_Compra_Presentacion = $_POST["PrecioCompraPresentacion"];
$Precio_Venta_Presentacion = $_POST["PrecioVentaPresentacion"];
$productoDAO = new ProductoDAO();
if ($opcion === "IngresarUsuario") {
    $num = 0;
    $var = $productoDAO->InsertProducto($Producto, $Es_Producto, $usu_Creacion, $id_Presentacion, $id_Categoria, $id_Local, $id_Proveedor, $Precio_Compra, $Precio_Venta, $Precio_Compra_Presentacion, $Precio_Venta_Presentacion);
    $res = ingres_fetch_array($var);
    echo json_encode($res);
}
if ($opcion === "ModificarUsuario") {
    $num = 0;
    $var = $productoDAO->InsertProducto($Producto, $Es_Producto, $usu_Creacion, $id_Presentacion, $id_Categoria, $id_Local, $id_Proveedor, $Precio_Compra, $Precio_Venta, $Precio_Compra_Presentacion, $Precio_Venta_Presentacion);
    $res = ingres_fetch_array($var);
    echo json_encode($res);
}
if ($opcion === "ListarProducto") {
    $num = 0;
    $var = $productoDAO->SelectProducto();
    $res = ingres_fetch_array($var);
    echo json_encode($res);
}
?>
