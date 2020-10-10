<?php
require_once '../Factory/Conexion.php';

class LocalDAO {

    public function ListarLocal() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ListaLocal;");
        return $result2;
    }

}