<?php
require_once '../Factory/Conexion.php';

class LocalDAO {

    public function ListarLocal() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaLocal;");
        return $result2;
    }

}