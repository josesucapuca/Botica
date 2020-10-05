<?php

require '../Controlador/Usuario.php';

class UsuarioDAO {

    public function ValidarUsuario($Usuario, $Password) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = $ConexionBD->query("SELECT count(*) as nro FROM USUARIO WHERE cod_usu=$Usuario and pass_usu=$Password;");
        while ($data = $result->fetch_object()) {
            $nro = $data->nro;
            if($nro !==0){
                
            }
        }
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
