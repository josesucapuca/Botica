<?php
require_once '../Factory/Conexion.php';

class EmpleadoDAO {

    public function ListarEmpleado() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ;");
        return $result2;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

