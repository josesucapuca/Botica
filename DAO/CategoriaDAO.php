<?php
require_once '../Factory/Conexion.php';

class CategoriaDAO {

    public function ListarCategoriaDAO() {
        $Conexion2 = new Conexion();
        $ConexionBD = $Conexion2->ConectarBD();
        $result2 = $ConexionBD->query("call ListaCategoria");
        return $result2;
    }
}
