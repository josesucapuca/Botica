<?php
require '../Factory/Conexion.php';

class LocalDAO {

    public function ListarLocalDAO() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ListarLocal()");
        return $result2;
    }

}