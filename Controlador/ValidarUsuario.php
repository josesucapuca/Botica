<?php
require '../DAO/UsuarioDAO.php';
$usuario = $_GET[usuario];
$password = $_GET[password];
$usuarioDAO = new UsuarioDAO();
?> <script type="text/javascript">alert(<?php echo $usuario?>) </script><?php
$val = $usuarioDAO->ValidarUsuario($usuario, $password);
if ($Opcion == 'validar') {
    return $val;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>