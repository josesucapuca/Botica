<?php

require_once '../Factory/Conexion.php';

class ProveedorDAO {

    public function SelectProveedor($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = mysqli_query($ConexionBD, "call ListaProveedorByEmpresa($id_Empresa);");
        return $result;
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
