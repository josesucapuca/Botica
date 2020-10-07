<?php

require '../Factory/Conexion.php';

class ProductoDAO {

    public function SelectProducto() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = $ConexionBD->query("call ListaProductos;");
        return $result;
        mysql_close($ConexionBD);
    }

    public function InsertProducto($Producto,
            $Es_Producto,
            $usu_Creacion,
            $id_Presentacion,
            $id_Categoria,
            $id_Local,
            $id_Proveedor,
            $Precio_Compra,
            $Precio_Venta,
            $Precio_Compra_Presentacion,
            $Precio_Venta_Presentacion) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call IngresarProducto('" . $Producto . "','" . $Es_Producto . "'," . $usu_Creacion . "," . $id_Presentacion . "," . $id_Categoria . "," . $id_Local . "," . $id_Proveedor . "," . $Precio_Compra . "," . $Precio_Venta . "," . $Precio_Compra_Presentacion . "," . $Precio_Venta_Presentacion . ");");
        return $result2;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

