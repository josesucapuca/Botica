<?php

require_once '../Factory/Conexion.php';

class ProductoDAO {

    public function SelectProducto($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = mysqli_query($ConexionBD, "call ListaProductoByEmpresa($id_Empresa);");
        return $result;
    }
    public function ListaProductosEliminados($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = mysqli_query($ConexionBD, "call ListaProductoEliminado ($id_Empresa);");
        return $result;
    }
    public function ListaProductoProcCompByEmpresa($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = mysqli_query($ConexionBD, "call ListaProductoProcCompByEmpresa ($id_Empresa);");
        return $result;
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
