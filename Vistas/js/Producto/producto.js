/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("#btn_Modificar").click(function () {
    ValidarCamposModificacion();
});
$("#btn_Enviar").click(function () {
    ValidarCamposIngresar();
});
function ListarCategoria(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: {opcCat: "ListarCategoriaByEmpresa", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia cat");
                //location.href = "CRUD_Productos.php";
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
function ListarLocal(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Local.php',
        data: {opc: "ListarLocalByEmpresa", id: id},
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
function ListarProveedor(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "ListarProveedorByIdEmpresa", id: id},
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
                alert(response)
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
function EliminarProducto(idu, idp) {
    //alert()
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: {opc: "EliminarProducto", id_Usuario: idu, id_Producto: idp},
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
function ProductoValido(op) {
    if (op === "i") {
        var Producto = $("#Producto");
        Producto.removeClass("is-invalid");
        Producto.addClass("is-valid");
        $("#ProValid").css("display", "block");
        $("#ProInValid").css("display", "none");
    } else if (op === "m") {
        var Producto = $("#ProductoMod");
        Producto.removeClass("is-invalid");
        Producto.addClass("is-valid");
        $("#ProMValid").css("display", "block");
        $("#ProMInValid").css("display", "none");
    }

}
function ProductoInvalido(op) {
    if (op === "i") {
        var Producto = $("#Producto");
        Producto.removeClass("is-valid");
        Producto.addClass("is-invalid");
        $("#ProValid").css("display", "none");
        $("#ProInValid").css("display", "block");
    } else if (op === "m") {
        var Producto = $("#ProductoMod");
        Producto.removeClass("is-valid");
        Producto.addClass("is-invalid");
        $("#ProMValid").css("display", "none");
        $("#ProMInValid").css("display", "block");
    }
}
function EstadoValido(op) {
    if (op === "i") {
        var Estado = $("#Estado");
        Estado.removeClass("is-invalid");
        Estado.addClass("is-valid");
        $("#EsValid").css("display", "block");
        $("#EsInValid").css("display", "none");
    } else if (op === "m") {
        var Estado = $("#EstadoMod");
        Estado.removeClass("is-invalid");
        Estado.addClass("is-valid");
        $("#EsMValid").css("display", "block");
        $("#EsMInValid").css("display", "none");
    }

}
function EstadoInvalido(op) {
    if (op === "i") {
        var Estado = $("#Estado");
        Estado.removeClass("is-valid");
        Estado.addClass("is-invalid");
        $("#EsValid").css("display", "none");
        $("#EsInValid").css("display", "block");
    } else if (op === "m") {
        var Estado = $("#EstadoMod");
        Estado.removeClass("is-valid");
        Estado.addClass("is-invalid");
        $("#EsMValid").css("display", "none");
        $("#EsMInValid").css("display", "block");
    }
}
function LocalValido(op) {
    if (op === "i") {
        var Local = $("#Local");
        Local.removeClass("is-invalid");
        Local.addClass("is-valid");
        $("#LocValid").css("display", "block");
        $("#LocInValid").css("display", "none");
    } else if (op === "m") {
        var Local = $("#LocalMod");
        Local.removeClass("is-invalid");
        Local.addClass("is-valid");
        $("#LocMValid").css("display", "block");
        $("#LocMInValid").css("display", "none");
    }

}
function LocalInvalido(op) {
    if (op === "i") {
        var Local = $("#Local");
        Local.removeClass("is-valid");
        Local.addClass("is-invalid");
        $("#LocValid").css("display", "none");
        $("#LocInValid").css("display", "block");
    } else if (op === "m") {
        var Local = $("#LocalMod");
        Local.removeClass("is-valid");
        Local.addClass("is-invalid");
        $("#LocMValid").css("display", "none");
        $("#LocMInValid").css("display", "block");
    }
}
function CategoriaValido(op) {
    if (op === "i") {
        var Categoria = $("#Categoria");
        Categoria.removeClass("is-invalid");
        Categoria.addClass("is-valid");
        $("#CatValid").css("display", "block");
        $("#CatInValid").css("display", "none");
    } else if (op === "m") {
        var Categoria = $("#CategoriaMod");
        Categoria.removeClass("is-invalid");
        Categoria.addClass("is-valid");
        $("#CatMValid").css("display", "block");
        $("#CatMInValid").css("display", "none");
    }

}
function CategoriaInvalido(op) {
    if (op === "i") {
        var Categoria = $("#Categoria");
        Categoria.removeClass("is-valid");
        Categoria.addClass("is-invalid");
        $("#CatValid").css("display", "none");
        $("#CatInValid").css("display", "block");
    } else if (op === "m") {
        var Categoria = $("#CategoriaMod");
        Categoria.removeClass("is-valid");
        Categoria.addClass("is-invalid");
        $("#CatMValid").css("display", "none");
        $("#CatMInValid").css("display", "block");
    }
}
function ProveedorValido(op) {
    if (op === "i") {
        var Proveedor = $("#Proveedor");
        Proveedor.removeClass("is-invalid");
        Proveedor.addClass("is-valid");
        $("#ProvValid").css("display", "block");
        $("#ProvInValid").css("display", "none");
    } else if (op === "m") {
        var Proveedor = $("#ProveedorMod");
        Proveedor.removeClass("is-invalid");
        Proveedor.addClass("is-valid");
        $("#ProvMValid").css("display", "block");
        $("#ProvMInValid").css("display", "none");
    }

}
function ProveedorInvalido(op) {
    if (op === "i") {
        var Proveedor = $("#Proveedor");
        Proveedor.removeClass("is-valid");
        Proveedor.addClass("is-invalid");
        $("#ProvValid").css("display", "none");
        $("#ProvInValid").css("display", "block");
    } else if (op === "m") {
        var Proveedor = $("#ProveedorMod");
        Proveedor.removeClass("is-valid");
        Proveedor.addClass("is-invalid");
        $("#ProvMValid").css("display", "none");
        $("#ProvMInValid").css("display", "block");
    }
}
function ValidarCamposModificacion() {
    var Producto = $("#ProductoMod");
    var Estado = $("#EstadoMod");
    var Local = $("#LocalMod");
    var Categoria = $("#CategoriaMod");
    var Proveedor = $("#ProveedorMod");
    if (Producto.val() !== "" && Estado.val() !== ""
            && Local.val() !== ""
            && Categoria.val() !== ""
            && Proveedor.val() !== "") {
        ModificarProducto();
    } else {
        if (Producto.val() !== "") {
            ProductoValido("m");
        } else {
            ProductoInvalido("m");
        }
        if (Estado.val() !== "") {
            EstadoValido("m");
        } else {
            EstadoInvalido("m");
        }
        if (Local.val() !== "") {
            LocalValido("m");
        } else {
            LocalInvalido("m");
        }
        if (Categoria.val() !== "") {
            CategoriaValido("m");
        } else {
            CategoriaInvalido("m");
        }
        if (Proveedor.val() !== "") {
            ProveedorValido("m");
        } else {
            ProveedorInvalido("m");
        }
    }
}
function ValidarCamposIngresar() {
    var Producto = $("#Producto");
    var Estado = $("#Estado");
    var Local = $("#Local");
    var Categoria = $("#Categoria");
    var Proveedor = $("#Proveedor");
    if (Producto.val() !== "" && Estado.val() !== ""
            && Local.val() !== ""
            && Categoria.val() !== ""
            && Proveedor.val() !== "") {
        InsertarProducto();
    } else {
        if (Producto.val() !== "") {
            ProductoValido("i");
        } else {
            ProductoInvalido("i");
        }
        if (Estado.val() !== "") {
            EstadoValido("i");
        } else {
            EstadoInvalido("i");
        }
        if (Local.val() !== "") {
            LocalValido("i");
        } else {
            LocalInvalido("i");
        }
        if (Categoria.val() !== "") {
            CategoriaValido("i");
        } else {
            CategoriaInvalido("i");
        }
        if (Proveedor.val() !== "") {
            ProveedorValido()("i");
        } else {
            ProveedorInvalido("i");
        }
    }
}

