<?php

require_once '../Factory/Conexion.php';
/**
 * Description of ProductoPresentacionDAO
 *
 * @author ANALIST-SUCARRTECH
 */
class ProductoPresentacionDAO {
    //put your code here
    public function ListarProductoPresentacionByEmpresa($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = mysqli_query($ConexionBD, "call ListaProductoPresentacionByEmpresa($id_Empresa);");
        return $result;
    }
    public function ListarProductoPresentacionByLocal($id_Local) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = mysqli_query($ConexionBD, "call ListaProductoPresentacionByLocal($id_Local);");
        return $result;
    }
}
