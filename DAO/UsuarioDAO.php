<?php
require '../Factory/Conexion.php';

class UsuarioDAO {

    public function ValidarUsuario($Usuario, $Password) {
        $ret = 0;
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result = $ConexionBD->query("SELECT count(*)as nro FROM usuario where Usuario='" . $Usuario . "' and Password='" . $Password . "' and Es_Usuario= 1;");
        while ($data = $result->fetch_object()) {
            $ret = $data->nro;
        }
        return $ret;
    }

    public function SelectUsuariobyUsuPass($Usuario, $Password) {
        $Conexion = new Conexion();
        $ConexionBD = $Conexion->ConectarBD();
        $result2 = $ConexionBD->query("call ListarLogueo('".$Usuario."','".$Password."')");
        while ($data=$result2->fetch_object){?>
        <script type="text/javascript" charset="utf-8">
            alert(<?php echo $data->usuario ?>);
        </script>
        <?php
        
        }
        return $result2;
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
