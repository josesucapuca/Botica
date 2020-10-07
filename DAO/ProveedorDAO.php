<?php
require '../Factory/Conexion.php';

class ProveedorDAO {

    public function ListarProveedor() {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ListaProductos;");
        return $result2;
        mysql_close($ConexionBD);
    }

}