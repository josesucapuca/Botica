<?php
require_once '../Factory/Conexion.php';

class PresentacionDAO {

    public function ListarPresentacionDAO() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ListaPresentacion;");
        return $result2;
    }

}