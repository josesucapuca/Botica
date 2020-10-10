<?php
require_once '../Factory/Conexion.php';

class ProveedorDAO {

    public function SelectProveedor() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = $ConexionBD->query("call ListaProveedor;");
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
