<?php
require '../Factory/Conexion.php';

class CategoriaDAO {

    public function ListarCategoriaDAO() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ListarCategoria()");
        return $result2;
    }

}