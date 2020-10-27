<?php
require_once '../Factory/Conexion.php';
class EmpresaDAO{
    
    function ListarEmpresa(){
        $Conexion= new Conexion();
        $ConexionBD=$Conexion->ConectarBD();
        $var=mysqli_query($ConexionBD, "call ListaEmpresa;");
        return $var;
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

