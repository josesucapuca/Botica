<?php

require_once '../Factory/Conexion.php';

class ProductoDAO {



    public function SelectProducto() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = $ConexionBD->query("call ListaProductos;");
        return $result;
    }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>