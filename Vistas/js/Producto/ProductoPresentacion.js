function isCommaDecimalNumber(value) {
    return /^-?(?:\d+(?:,\d*)?)$/.test(value);
}
$("#btn_Enviar").click(function () {
    ValidarCamposIngresar();
});
$("#btn_Modificar").click(function () {
    ValidarCamposModificacion();
});
$('#PrecioCompraMod').change(function () {

    if ($('#PrecioCompraMod').val() < 0) {
        $('#PrecioCompraMod').val("");
    }
});
$('#PrecioCompraMod').keypress(function () {
    if ($('#PrecioCompraMod').val() < 0) {
        $('#PrecioCompraMod').val("");
    }
});
$('#PrecioVentaMod').change(function () {
    if ($('#PrecioVentaMod').val() < 0) {
        $('#PrecioVentaMod').val("");
    }
});
$('#PrecioVentaMod').keypress(function () {
    if ($('#PrecioVentaMod').val() < 0) {
        $('#PrecioVentaMod').val("");
    }
});
$('#CantidadUnidadesMod').keypress(function () {
    if (isCommaDecimalNumber($('#CantidadUnidadesMod').val())) {
        if ($('#CantidadUnidadesMod').val() < 0) {
            $('#CantidadUnidadesMod').val("");
        }
    } else {
        $('#CantidadUnidadesMod').val("");
    }
});
$('#CantidadUnidadesMod').change(function () {
    if (isCommaDecimalNumber($('#CantidadUnidadesMod').val())) {
        if ($('#CantidadUnidadesMod').val() < 0) {
            $('#CantidadUnidadesMod').val("");
        }
    } else {
        $('#CantidadUnidadesMod').val("");
    }
});
$('#PrecioCompra').change(function () {

    if ($('#PrecioCompra').val() < 0) {
        $('#PrecioCompra').val("");
    }
});
$('#PrecioCompra').keypress(function () {
    if ($('#PrecioCompra').val() < 0) {
        $('#PrecioCompra').val("");
    }
});
$('#PrecioVenta').change(function () {
    if ($('#PrecioVenta').val() < 0) {
        $('#PrecioVenta').val("");
    }
});
$('#PrecioVenta').keypress(function () {
    if ($('#PrecioVenta').val() < 0) {
        $('#PrecioVenta').val("");
    }
});
$('#CantidadUnidades').keypress(function () {
    if ($('#CantidadUnidades').val() < 0) {
        $('#CantidadUnidades').val("");
    }

});
$('#CantidadUnidades').change(function () {
    if ($('#CantidadUnidades').val() < 0) {
        $('#CantidadUnidades').val("");
    }
});
function ListaProductos(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Producto.php',
        data: {opc: "ListarProductos", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "RegistrarPrecios_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Producto === "1") {
                        html += '<option class="alert alert-success" value="' + jsonData[i].id_Producto + '">' + jsonData[i].No_Producto + '</option>';
                    } else {
                        html += '<option class="alert alert-danger" value="' + jsonData[i].id_Producto + '">' + jsonData[i].No_Producto + '</option>';
                    }
                }
                $("#ProductoMod").append(html);
            }
        }
    });
}
function ListaPresentacion(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: {opc: "ListarPresentacionByEmpresa", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "RegistrarPrecios_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Presentacion === "1") {
                        html += '<option class="alert alert-success" value="' + jsonData[i].id_Presentacion + '">' + jsonData[i].No_Presentacion + '</option>';
                    } else {
                        html += '<option class="alert alert-danger" value="' + jsonData[i].id_Presentacion + '">' + jsonData[i].No_Presentacion + '</option>';
                    }
                }
                $("#PresentacionMod").append(html);
            }
        }
    });
}

function ValidarCamposModificacion() {
    var Producto = $("#ProductoMod");
    var Presentacion = $("#PresentacionMod");
    var Estado = $("#EstadoMod");
    var PrecioCompra = $("#PrecioCompraMod");
    var PrecioVenta = $("#PrecioVentaMod");
    var CantidadUnidades = $("#CantidadUnidadesMod");
    if (Producto.val() !== "" && Estado.val() !== ""
            && Presentacion.val() !== ""
            && PrecioCompra.val() !== ""
            && PrecioVenta.val() !== ""
            && CantidadUnidades.val() !== "") {
        if (isCommaDecimalNumber(CantidadUnidades.val())) {
            ModificarProductoPresentacion();
        } else {
            CantidadUnidadesInvalido("m");
        }
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
        if (Presentacion.val() !== "m") {
            PresentacionValido("m");
        } else {
            PresentacionInvalido("m");
        }
        if (PrecioCompra.val() !== "m") {
            PrecioCompraValido();
        } else {
            PrecioCompraInvalido("m");
        }
        if (PrecioVenta.val() !== "m") {
            PrecioVentaValido("m");
        } else {
            PrecioVentaInvalido("m");
        }
        if (CantidadUnidades.val() !== "m") {
            if (isCommaDecimalNumber(CantidadUnidades.val())) {
                CantidadUnidadesValido("m");
            } else {
                CantidadUnidadesInvalido("m");
            }
        } else {
            CantidadUnidadesInvalido("m");
        }
    }
}
function ValidarCamposIngresar() {
    var Producto = $("#Producto");
    var Presentacion = $("#Presentacion");
    var Estado = $("#Estado");
    var PrecioCompra = $("#PrecioCompra");
    var PrecioVenta = $("#PrecioVenta");
    var CantidadUnidades = $("#CantidadUnidades");
    if (Producto.val() !== "" && Estado.val() !== ""
            && Presentacion.val() !== ""
            && PrecioCompra.val() !== ""
            && PrecioVenta.val() !== ""
            && CantidadUnidades.val() !== "") {
        InsertarProductoPresentacion();
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
        if (Presentacion.val() !== "") {
            PresentacionValido("i");
        } else {
            PresentacionInvalido("i");
        }
        if (PrecioCompra.val() !== "") {
            PrecioCompraValido("i");
        } else {
            PrecioCompraInvalido("i");
        }
        if (PrecioVenta.val() !== "") {
            PrecioVentaValido("i");
        } else {
            PrecioVentaInvalido("i");
        }
        if (CantidadUnidades.val() !== "") {
            CantidadUnidadesValido("i");
        } else {
            CantidadUnidadesInvalido("i");
        }
    }
}
function InsertarProductoPresentacion() {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: $("#FormIngresarProdPresentacion").serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "RegistrarPrecios_Producto.php";
            } else {

            }
        }
    });
}
function ModificarProductoPresentacion() {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: $("#FormModificarProdPres").serialize(),
        success: function (response)
        {
            if (response === "true") {
                location.href = "RegistrarPrecios_Producto.php";
            } else {
                alert("No Hay cambios");
                location.href = "RegistrarPrecios_Producto.php";
            }
        }
    });
}
function EliminarProductoPresentacion(idu, id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "EliminarProductoPresentacion", id: id, id_US: idu},
        success: function (response)
        {
            if (response === "true") {
                location.href = "RegistrarPrecios_Producto.php";
            } else {
                alert("No Hay cambios");
                location.href = "RegistrarPrecios_Producto.php";
            }
        }
    });
}
function LMDPP(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "ListarProductoPresentacionById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "RegistrarPrecios_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                for (var i = 0; i < jsonData.length; i++) {
                    $("#ProductoMod option[value='" + jsonData[i].id_Producto + "']").attr("selected", true);
                    $("#PresentacionMod option[value='" + jsonData[i].id_Presentacion + "']").attr("selected", true);
                    $("#idProductoPresentacion").val(jsonData[i].id_Producto_Presentacion);
                    $("#PrecioCompraMod").val(jsonData[i].Precio_Compra);
                    $("#PrecioVentaMod").val(jsonData[i].Precio_Venta);
                    $("#CantidadUnidadesMod").val(jsonData[i].Cant_Unidades);
                }
            }
        }
    });
}
function LlDM(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "ListarProductoPresentacionById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "RegistrarPrecios_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                for (var i = 0; i < jsonData.length; i++) {
                    $("#Usu_Creacion").append(jsonData[i].Usuario_Creacion);
                    
                    $("#Usu_Mod").append(jsonData[i].Usuario_Modificacion);
                }
            }
        }
    });
}






function ProductoValido(op) {
    if (op === "i") {
        $("#Producto_chosen").removeClass("is-invalid");
        $("#Producto_chosen").addClass("is-valid");
        $("#ProValid").css("display", "block");
        $("#ProInValid").css("display", "none");
    } else if (op === "m") {
        var Producto = $("#ProductoMod");
        Producto.removeClass("is-invalid");
        Producto.addClass("is-valid");
        $("#ProModValid").css("display", "block");
        $("#ProModInValid").css("display", "none");
    }

}
function ProductoInvalido(op) {
    if (op === "i") {
        var Producto = $("#Producto");
        $("#Producto_chosen").removeClass("is-valid");
        $("#Producto_chosen").addClass("is-invalid");
        $("#ProValid").css("display", "none");
        $("#ProInValid").css("display", "block");
    } else if (op === "m") {
        var Producto = $("#ProductoMod");
        Producto.removeClass("is-valid");
        Producto.addClass("is-invalid");
        $("#ProModValid").css("display", "none");
        $("#ProModInValid").css("display", "block");
    }
}

function PresentacionValido(op) {
    if (op === "i") {
        var Presentacion = $("#Presentacion");
        $("#Presentacion_chosen").removeClass("is-invalid");
        $("#Presentacion_chosen").addClass("is-valid");
        $("#PreValid").css("display", "block");
        $("#PreInValid").css("display", "none");
    } else if (op === "m") {
        var Presentacion = $("#PresentacionMod");
        Presentacion.removeClass("is-invalid");
        Presentacion.addClass("is-valid");
        $("#PreModValid").css("display", "block");
        $("#PreModInValid").css("display", "none");
    }

}
function PresentacionInvalido(op) {
    if (op === "i") {
        var Presentacion = $("#Presentacion");
        $("#Presentacion_chosen").removeClass("is-valid");
        $("#Presentacion_chosen").addClass("is-invalid");
        $("#PreValid").css("display", "none");
        $("#PreInValid").css("display", "block");
    } else if (op === "m") {
        var Presentacion = $("#PresentacionMod");
        Presentacion.removeClass("is-valid");
        Presentacion.addClass("is-invalid");
        $("#PreModValid").css("display", "none");
        $("#PreModInValid").css("display", "block");
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
        $("#EsModValid").css("display", "block");
        $("#EsModInValid").css("display", "none");
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
        $("#EsModValid").css("display", "none");
        $("#EsModInValid").css("display", "block");
    }
}

function PrecioCompraValido(op) {
    if (op === "i") {
        var PrecioCompra = $("#PrecioCompra");
        PrecioCompra.removeClass("is-invalid");
        PrecioCompra.addClass("is-valid");
        $("#PCValid").css("display", "block");
        $("#PCInValid").css("display", "none");
    } else if (op === "m") {
        var PrecioCompra = $("#PrecioCompraMod");
        PrecioCompra.removeClass("is-invalid");
        PrecioCompra.addClass("is-valid");
        $("#PCModValid").css("display", "block");
        $("#PCModInValid").css("display", "none");
    }

}
function PrecioCompraInvalido(op) {
    if (op === "i") {
        var PrecioCompra = $("#PrecioCompra");
        PrecioCompra.removeClass("is-valid");
        PrecioCompra.addClass("is-invalid");
        $("#PCValid").css("display", "none");
        $("#PCInValid").css("display", "block");
    } else if (op === "m") {
        var PrecioCompra = $("#PrecioCompraMod");
        PrecioCompra.removeClass("is-valid");
        PrecioCompra.addClass("is-invalid");
        $("#PCModValid").css("display", "none");
        $("#PCModInValid").css("display", "block");
    }
}

function PrecioVentaValido(op) {
    if (op === "i") {
        var PrecioVenta = $("#PrecioVenta");
        PrecioVenta.removeClass("is-invalid");
        PrecioVenta.addClass("is-valid");
        $("#PVValid").css("display", "block");
        $("#PVInValid").css("display", "none");
    } else if (op === "m") {
        var PrecioVenta = $("#PrecioVentaMod");
        PrecioVenta.removeClass("is-invalid");
        PrecioVenta.addClass("is-valid");
        $("#PVModValid").css("display", "block");
        $("#PVModInValid").css("display", "none");
    }

}
function PrecioVentaInvalido(op) {
    if (op === "i") {
        var PrecioVenta = $("#PrecioVenta");
        PrecioVenta.removeClass("is-valid");
        PrecioVenta.addClass("is-invalid");
        $("#PVValid").css("display", "none");
        $("#PVInValid").css("display", "block");
    } else if (op === "m") {
        var PrecioVenta = $("#PrecioVentaMod");
        PrecioVenta.removeClass("is-valid");
        PrecioVenta.addClass("is-invalid");
        $("#PVModValid").css("display", "none");
        $("#PVModInValid").css("display", "block");
    }
}

function CantidadUnidadesValido(op) {
    if (op === "i") {
        var CantidadUnidades = $("#CantidadUnidades");
        CantidadUnidades.removeClass("is-invalid");
        CantidadUnidades.addClass("is-valid");
        $("#CUValid").css("display", "block");
        $("#CUInValid").css("display", "none");
    } else if (op === "m") {
        var CantidadUnidades = $("#CantidadUnidadesMod");
        CantidadUnidades.removeClass("is-invalid");
        CantidadUnidades.addClass("is-valid");
        $("#CUModValid").css("display", "block");
        $("#CUModInValid").css("display", "none");
    }

}
function CantidadUnidadesInvalido(op) {
    if (op === "i") {
        var CantidadUnidades = $("#CantidadUnidades");
        CantidadUnidades.removeClass("is-valid");
        CantidadUnidades.addClass("is-invalid");
        $("#CUValid").css("display", "none");
        $("#CUInValid").css("display", "block");
    } else if (op === "m") {
        var CantidadUnidades = $("#CantidadUnidadesMod");
        CantidadUnidades.removeClass("is-valid");
        CantidadUnidades.addClass("is-invalid");
        $("#CUModValid").css("display", "none");
        $("#CUModInValid").css("display", "block");
    }
}


