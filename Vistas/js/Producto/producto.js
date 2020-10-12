/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    ListarCategoria();
    ListarLocal();
    ListarPresentacion();
    ListarProveedor();
    $("#btn_Modificar").click(function () {
        ModificarProducto();
    });
});
function ListarCategoria() {

    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: {opcCat: "ListarCategoria"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia cat");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Categoria === "1") {
                        html += '<option class="alert alert-success" value="' + jsonData[i].id_Categoria + '">' + jsonData[i].No_Categoria + '</option>'
                    } else {
                        html += '<option class="alert alert-danger" value="' + jsonData[i].id_Categoria + '">' + jsonData[i].No_Categoria + '</option>'
                    }
                }
                $("#Categoria").append(html);
                $("#CategoriaMod").append(html);
            }
        }
    });
}
function ListarPresentacion() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: {opc: "ListarPresentacion"},
        success: function (response)
        {

            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Presentacion === "1") {
                        html += '<option class="alert alert-success" value="' + jsonData[i].id_Presentacion + '">' + jsonData[i].No_Presentacion + '</option>'
                    } else {
                        html += '<option class="alert alert-danger" value="' + jsonData[i].id_Presentacion + '">' + jsonData[i].No_Presentacion + '</option>'
                    }
                }
                $("#Presentacion").append(html);
                $("#PresentacionMod").append(html);
            }

        }
    });
}
function ListarLocal() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Local.php',
        data: {opc: "ListarLocal"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Local === "1") {
                        html += '<option class="alert alert-success" value="' + jsonData[i].id_Local + '">' + jsonData[i].No_Local + '</option>'
                    } else {
                        html += '<option class="alert alert-danger" value="' + jsonData[i].id_Local + '">' + jsonData[i].No_Local + '</option>'
                    }
                }
                $("#Local").append(html);
                $("#LocalMod").append(html);
            }
        }
    });
}
function ListarProveedor() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "ListarProveedor"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pro");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Proveedor === "1") {
                        html += '<option class="alert alert-success" value="' + jsonData[i].id_Proveedor + '">' + jsonData[i].No_Proveedor + '</option>'
                    } else {
                        html += '<option class="alert alert-danger" value="' + jsonData[i].id_Proveedor + '">' + jsonData[i].No_Proveedor + '</option>'
                    }
                }
                $("#Proveedor").append(html);
                $("#ProveedorMod").append(html);
                //location.href = "CRUD_Categorias.php";
            }
        }
    });
}
function InsertarProducto() {
    //alert()
    //alert();
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: $("#FormIngresarProd").serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "CRUD_Productos.php";
            } else {
            }
        }
    });
}
function ModificarProducto() {
    //alert()
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: $("#FormModificarProd").serialize(),
        success: function (response)
        {
            //alert(response)
            if (response === "true") {
                location.href = "CRUD_Productos.php";
            } else {

            }
        }
    });
}
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
function DesactivarProducto(idu, idp) {
    //alert()
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: {opc: "DesactivarProducto", id_Usuario: idu, id_Producto: idp},
        success: function (response)
        {
            if (response) {
                // alert("Se Desactivo Correctamente");
                location.href = "CRUD_Productos.php";
            } else {
                alert("No se Desactivo Correctamente");
                location.href = "CRUD_Productos.php";

            }
        }
    });
}
function ActivarProducto(idu, idp) {
    //alert()
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: {opc: "ActivarProducto", id_Usuario: idu, id_Producto: idp},
        success: function (response)
        {
            if (response) {
                //alert("Se Desactivo Correctamente");
                location.href = "CRUD_Productos.php";
            } else {
                alert("No se Desactivo Correctamente");
                location.href = "CRUD_Productos.php";

            }
        }
    });
}
function LlenarDat(id) {

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
                for (var i = 0; i < jsonData.length; i++) {
                    $("#ProductoMod").val(jsonData[i].No_Producto);
                    $("#id_ProductoMod").val(jsonData[i].id_Producto);
                    if (jsonData[i].Es_Producto === "1") {
                        $("#EstadoMod option[value='1']").attr("selected", true);
                    } else if (jsonData[i].Es_Producto === "0") {
                        $("#EstadoMod option[value='0']").attr("selected", true);

                    }
                    $("#CategoriaMod option[value='" + jsonData[i].id_Categoria + "']").attr("selected", true);
                    $("#PresentacionMod option[value='" + jsonData[i].id_Presentacion + "']").attr("selected", true);
                    $("#LocalMod option[value='" + jsonData[i].id_Local + "']").attr("selected", true);
                    $("#ProveedorMod option[value='" + jsonData[i].id_Proveedor + "']").attr("selected", true);
                    $("#PrecioCompraMod").val(jsonData[i].Precio_Compra);
                    $("#PrecioVentaMod").val(jsonData[i].Precio_Venta);
                    $("#PrecioPresCompraMod").val(jsonData[i].Precio_Compra_Presentacion);
                    $("#PrecioPresVentaMod").val(jsonData[i].Precio_Venta_Presentacion);
                }

            }
        }
    });
}

