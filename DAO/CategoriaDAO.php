<?php
require_once '../Factory/Conexion.php';

class CategoriaDAO {

    public function ListarCategoriaDAO( $id_Empresa) {
        $Conexion2 = new Conexion();
        $ConexionBD = $Conexion2->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaCategoriaByEmpresa($id_Empresa)");
        return $result2;
    }
}
