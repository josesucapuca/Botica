
function DatProd(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: {opc: "ListarProductobyid", id_Prd: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia cat");
                //location.href = "CRUD_Productos.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                //alert(jsonData.length);
                for (var i = 0; i < jsonData.length; i++) {

                    if (jsonData[i].Usuario_Creacion !== null) {
                        $("#Usu_Creacion").empty();
                        $("#Fecha_Creacion").empty();
                        $("#Usu_Creacion").append(jsonData[i].Usuario_Creacion);
                        $("#Fecha_Creacion").append(jsonData[i].Fe_Creacion);

                    } else {
                        $("#Usu_Creacion").empty();
                        $("#Fecha_Creacion").empty();
                        $("#Usu_Creacion").append("No se Grabo Correctamente");
                        $("#Fecha_Creacion").append("---");
                    }
                    if (jsonData[i].Usuario_Modificacion !== null)
                    {
                        $("#Usu_Mod").empty();
                        $("#Fe_Mod").empty();
                        $("#Usu_Mod").append(jsonData[i].Usuario_Modificacion);
                        $("#Fe_Mod").append(jsonData[i].Fe_Modificacion);
                    } else {
                        $("#Usu_Mod").empty();
                        $("#Fe_Mod").empty();
                        $("#Usu_Mod").append("No Tiene Modificaciones");
                        $("#Fe_Mod").append("---");
                    }


                }


            }
        }
    });
}
function RestaurarProducto(idu, idp) {
    //alert()
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: {opc: "RestaurarProducto", id_Usuario: idu, id_Producto: idp},
        success: function (response)
        {
            if (response) {
                // alert("Se Desactivo Correctamente");
                location.href = "PapeleraProductos.php";
            } else {
                alert("No se Desactivo Correctamente");
                location.href = "PapeleraProductos.php";

            }
        }
    });
}
