<?php

include_once "../Factory/ConexionOperacion.php";
$opcion = $_POST["opc"];

if ($opcion === "IngresarProducto") {
    $Producto = $_POST["Producto"];
    $Estado = $_POST["Estado_Producto"];
    $Categoria = $_POST["Categoria"];
    $Local = $_POST["Local"];
    $Proveedor = $_POST["Proveedor"];
    $UsuarioCreacion = $_POST["Usuariocreacion"];
    $consultda = " call  InsertarProducto('$Producto','$Estado',$UsuarioCreacion,$Categoria,$Local,$Proveedor)";
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
if ($opcion === "ListaProductoPresentacion") {
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
if ($opcion === "ListarProductos") {
    $emp = $_POST["id"];
    $consultda = "call ListaProductoByEmpresa($emp);";
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
    $Local = $_POST["LocalMod"];
    $Proveedor = $_POST["ProveedorMod"];
    $UsuarioModificacion = $_POST["UsuarioModificacion"];
    $consultda = " call  ModificarProducto($id_Producto,'$Producto','$Estado',"
            . "$UsuarioModificacion"
            . ",$Local,$Proveedor,$Categoria)";
    $var = mysqli_query($conexion, $consultda);
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
    $id_Producto = $_POST["id_Producto"];
    $id_Usuario = $_POST["id_Usuario"];
    $consultda = "call DesactivarProducto($id_Usuario,$id_Producto);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "RestaurarProducto") {
    $id_Producto = $_POST["id_Producto"];
    $id_Usuario = $_POST["id_Usuario"];
    $consultda = "call ActivarProducto($id_Usuario,$id_Producto);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
if ($opcion === "EliminarProducto") {
    //echo 'asa';
    $id_Producto = $_POST["id_Producto"];
    $id_Usuario = $_POST["id_Usuario"];
    $consultda = "call EliminarProducto($id_Usuario,$id_Producto);";
    $var = mysqli_query($conexion, $consultda);
    echo json_encode($var);
}
mysqli_close($conexion);
