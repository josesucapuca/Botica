<?php
require_once '../Factory/Conexion.php';

class PresentacionDAO {

    public function ListarPresentacionDAO($id_Empresa) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaPresentacionByEmpresa($id_Empresa);");
        return $result2;
    }

}