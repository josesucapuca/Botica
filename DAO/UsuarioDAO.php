<?php

require_once '../Factory/Conexion.php';
$ConexionBD;

class UsuarioDAO {
    public function ListarUsuario($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaUsuarioByEmpresa($id_Empresa);");
        return $result2;
    }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
