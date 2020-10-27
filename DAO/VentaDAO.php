<?php
require_once '../Factory/Conexion.php';

class VentaDAO {

    public function ListaVentaById($idVenta) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaVentaById($idVenta);");
        return $result2;
    }
    public function ListaDetalleVentaById($idVenta) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaDetalleVentaById($idVenta);");
        return $result2;
    }

}