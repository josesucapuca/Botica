<?php
require_once '../Factory/Conexion.php';

class ClienteDAO {

    public function ListaClienteEmpresaByEmpresa($id_Empresa) {
        $Conexion2 = new Conexion();
        $ConexionBD = $Conexion2->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaClienteEmpresaByEmpresa($id_Empresa)");
        return $result2;
    }
    public function ListaClientePersonaByEmpresa($id_Empresa) {
        $Conexion2 = new Conexion();
        $ConexionBD = $Conexion2->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaClientePersonaByEmpresa($id_Empresa)");
        return $result2;
    }
    public function ListaClienteByLocal($id_Local) {
        $Conexion2 = new Conexion();
        $ConexionBD = $Conexion2->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaClienteByLocal($id_Local)");
        return $result2;
    }
    public function ListaClienteByEmpresa($id_Emp) {
        $Conexion2 = new Conexion();
        $ConexionBD = $Conexion2->ConectarBD();
        $result2 = mysqli_query($ConexionBD,"call ListaClienteByEmpresa($id_Emp)");
        return $result2;
    }
}
