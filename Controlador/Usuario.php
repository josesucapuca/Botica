<form id="sd" action="../Vistas/Logueo.php" name="vote" method="post" style="display:none;"><input type="text" name="estado" value="invalido" /></form>
    <?php
    require '../DAO/UsuarioDAO.php';
    $opcion = $_POST["opcion"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $usuarioDAO = new UsuarioDAO();
    $val = $usuarioDAO->ValidarUsuario($usuario, $password);
    if ($val !== "0") {
        $DatosUsuario = $usuarioDAO->SelectUsuariobyUsuPass($usuario, $password);
        while ($data = $DatosUsuario->fetch_object()) {
            session_start();
            $_SESSION["Usuario"] = $data->usuario;
            $_SESSION["id_Usuario"] = $data->id_Usuario;
            $_SESSION["Nivel_Usuario"] = $data->Nivel_Usuario;
            $_SESSION["id_Empleado"] = $data->id_Empleado;
            $_SESSION["Empleado"] = $data->Empleado;
            $_SESSION["id_local"] = $data->id_local;
            $_SESSION["No_Local"] = $data->No_Local;
            ?>
        <script type="text/javascript" charset="utf-8">
            alert(<?php echo  $_SESSION["Usuario"]?>);
        </script>
        <html>
            <head>
                <title>Redirigir al navegador a otra URL</title>
                <META HTTP-EQUIV="REFRESH" CONTENT="0.1;../Vistas/Principal.php">
            </head>
            <body>

            </body>
        </html>
        <?php
    }
}
if ($val === "0") {
    ?>
        <script src="../Vistas/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf-8">

            //document.forms['vote'].submit();
            $(document).ready(function () {
                document.getElementById("sd").submit();
            });

            //location.href = "../Vistas/Inicio.php"
    </script>

    <?php
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>