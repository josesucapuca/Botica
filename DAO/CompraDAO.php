<?php
require_once '../Factory/Conexion.php';

class CompraDAO {

    public function ListaCompraById($idCompra) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaCompraById($idCompra);");
        return $result2;
    }
    public function ListaDetalleCompraById($idCompra) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaDetalleCompraById($idCompra);");
        return $result2;
    }

}