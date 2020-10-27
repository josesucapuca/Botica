var PrecTotal = 0;
$("#Presentacion").change(function () {
    ListarPrecioPorPre($("#Producto").val(), $("#Presentacion").val());
});
$('#example tbody').on('dblclick', 'tr', function () {
    var t = $('#example').DataTable();
    var a = t.rows(this).data();
    PrecTotal = PrecTotal - a[0][7];
    $("#CantTotal").val(Number.parseFloat(PrecTotal).toFixed(2));
    t.row(':eq(' + t.row(this).index() + ')').remove().draw(false);
});
$("#btn_Agregar").click(function () {
    if ($("#Producto").val() !== "" && $("#Presentacion").val() &&
            $("#precio").val() !== "" &&
            $("#FeVenc").val() !== "")
    {
        $("#ProInValid").css("display", "none");
        PresValido();
        precioValido();
        FeVencCompraValido();
        if ($("#cantidad").val() === "" || $("#cantidad").val() === "0") {
            CantInvalido();
            alert("Ingresar Cantidad de Producto");
        } else {
            $.ajax({
                type: "POST",
                url: '../Controlador/ProductoPresentacion.php',
                data: {opc: "ListaProductoProveedorByProdPres", idp: $("#Producto").val(), idpr: $("#Presentacion").val()},
                success: function (response)
                {
                    if (response === null || response === "") {
                        alert("La lista esta vacia pre");
                        location.href = "ProcesoCompra.php";
                    } else {

                        var jsonData = JSON.parse(response);


                        var t = $('#example').DataTable();
                        for (var i = 0; i < jsonData.length; i++) {
                            t.row.add([
                                (i + 1),
                                jsonData[i].id_Producto_Presentacion,
                                jsonData[i].No_Producto,
                                jsonData[i].No_Presentacion,
                                $("#cantidad").val(),
                                $("#FeVenc").val(),
                                $("#precio").val(),
                                Number.parseFloat((Number.parseFloat($("#precio").val()).toFixed(2) * Number.parseFloat($("#cantidad").val()).toFixed(2))).toFixed(2)
                            ]).draw(false);
                            PrecTotal = PrecTotal + (Number.parseFloat($("#precio").val()).toFixed(2) * Number.parseFloat($("#cantidad").val()).toFixed(2));
                            $("#CantTotal").val(Number.parseFloat(PrecTotal).toFixed(2));
                        }
                    }

                }
            });
        }
    } else {
        if ($("#Producto").val() === "") {
            ProInvalido();
        } else {
            $("#ProInValid").css("display", "none");
        }
        if ($("#Presentacion").val() === "") {
            PresInvalido();
        } else {
            PresValido();
        }
        if ($("#cantidad").val() === "") {
            CantInvalido();
        } else {
            CantValido();
        }
        if ($("#precio").val() === "") {
            precioInvalido();
        } else {
            precioValido();
        }
        if ($("#FeVenc").val() === "") {
            FeVencCompraInvalido();
        } else {
            FeVencCompraValido();
        }
    }
});
$("#btn_Registrar_Compra").click(function () {
    var a = $("#example").DataTable();
    if (a.rows().count() > 0) {
        if ($("#Proveedor").val() !== "" && $("#Local").val() !== ""
                && $("#EstadoCompra").val() !== "")
        {
            $.ajax({
                type: "POST",
                url: '../Controlador/Compra.php',
                data: {opc: "InsertarCompra",
                    Proveedor: $("#Proveedor").val(),
                    Local: $("#Local").val(),
                    EstadoCompra: $("#EstadoCompra").val(),
                    UsuarioCreacion: $("#UsuarioCreacion").val(),
                    CantTotal: $("#CantTotal").val()},
                success: function (response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData[0].id !== "0") {
                        var a = $("#example").DataTable();
                        var t = a.rows().data();
                        for (var i = 0; i < a.rows().count(); i++) {
                            RegistrarDetalleCompra(t[i][5], t[i][6], t[i][4], t[i][7], jsonData[0].id, t[i][1]);
                        }
                        location.href = "ImprimirCompra.php?id=" + jsonData[0].id;
                    } else {
                        for (var i = 0; i < jsonData.length; i++) {
                            PrecTotal = PrecTotal + (Number.parseFloat($("#precio").val()).toFixed(2) * Number.parseFloat($("#cantidad").val()).toFixed(2));
                            $("#PrTotal").empty();
                            $("#PrTotal").append(Number.parseFloat(PrecTotal).toFixed(2));

                        }
                    }
                }
            });
        } else {
            if ($("#Producto").val() === "") {
                ProInvalido();
            } else {
                $("#ProInValid").css("display", "none");
            }
            if ($("#Presentacion").val() === "") {
                PresInvalido();
            } else {
                PresValido();
            }
            if ($("#cantidad").val() === "") {
                CantInvalido();
            } else {
                CantValido();
            }
            if ($("#precio").val() === "") {
                precioInvalido();
            } else {
                precioValido();
            }
        }
    } else {
        alert("Ingresar Todos los datos");
    }
});
function RegistrarDetalleCompra(feVenc, PrcProd, Cant, PTotal, idC, idPP) {

    $.ajax({
        type: "POST",
        url: '../Controlador/Compra.php',
        data: {opc: "InsertarDetalleCompra",
            feVenc: feVenc,
            PrcProd: PrcProd,
            Cant: Cant,
            PTotal: PTotal,
            idC: idC,
            idPP: idPP,
            UsuarioCreacion: $("#UsuarioCreacion").val()},
        success: function (response)
        {
            return response;
        }
    });
}
function ListarLocalProCom(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Local.php',
        data: {opc: "ListarLocalByEmpresa", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoCompra.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                $("#Local").empty();
                html += "<option value=''>Seleccionar</option>";
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Es_Local === "1") {
                        html += "<option class='alert alert-success' value='" + jsonData[i].id_Local + "'>" + jsonData[i].No_Local + " - " + jsonData[i].Dir_Local + "</option>";
                    } else {
                        html += "<option class='alert alert-danger' value='" + jsonData[i].id_Local + "'>" + jsonData[i].No_Local + "</option>";
                    }
                }
                $("#Local").append(html);
            }
        }
    });
}
function ListarPresentacion(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "ListaProductoPresentacionIdProducto", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoCompra.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#Presentacion").empty();
                var html = "";
                if (jsonData.length > 1) {
                    $("#NroStock").empty();
                    $("#precio").val("");
                    html += "<option value=''>Seleccionar</option>";
                    for (var i = 0; i < jsonData.length; i++) {
                        html += "<option value='" + jsonData[i].id_Presentacion + "'>" + jsonData[i].No_Presentacion + "</option>";
                    }
                    $("#Stock").css("display", "none");
                    //alert(financial(jsonData[1].Precio_Compra))
                    //$("#precio").val(financial(jsonData[1].Precio_Compra));

                } else {
                    $("#NroStock").empty();
                    html += "<option value='" + jsonData[0].id_Presentacion + "' selected>" + jsonData[0].No_Presentacion + "</option>";
                    //alert(financial(jsonData[0].Precio_Compra))
                    $("#precio").val(financial(jsonData[0].Precio_Compra));
                    $("#Stock").css("display", "block");
                    $("#NroStock").append(jsonData[0].stock);

                }
                $("#Presentacion").append(html);
            }
        }
    });
}
function ListarPrecioPorPre(idp, idpr) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "ListaProductoProveedorByProdPres", idp: idp, idpr: idpr},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoCompra.php";
            } else {
                $("#NroStock").empty();
                var jsonData = JSON.parse(response);
                $("#Stock").css("display", "block");
                $("#precio").empty();
                for (var i = 0; i < jsonData.length; i++) {
                    $("#precio").val(financial(jsonData[i].Precio_Compra));
                    $("#NroStock").append(jsonData[i].stock);
                }
            }
        }
    });
}
function financial(x) {
    return Number.parseFloat(x).toFixed(2);
}
function ProInvalido() {
    $("#Stock").css("display", "none");
    $("#ProInValid").css("display", "block");
}
function PresValido() {
    $("#Presentacion").removeClass("is-invalid");
    $("#Presentacion").addClass("is-valid");
    $("#PresValid").css("display", "block");
    $("#PresInValid").css("display", "none");
}
function PresInvalido() {
    $("#Presentacion").removeClass("is-valid");
    $("#Presentacion").addClass("is-invalid");
    $("#PresValid").css("display", "none");
    $("#PresInValid").css("display", "block");
}
function CantValido() {
    $("#cantidad").removeClass("is-invalid");
    $("#cantidad").addClass("is-valid");
    $("#CantValid").css("display", "block");
    $("#CantInValid").css("display", "none");
}
function CantInvalido() {
    $("#cantidad").removeClass("is-valid");
    $("#cantidad").addClass("is-invalid");
    $("#CantValid").css("display", "none");
    $("#CantInValid").css("display", "block");
}
function precioValido() {
    $("#precio").removeClass("is-invalid");
    $("#precio").addClass("is-valid");
    $("#PrecValid").css("display", "block");
    $("#PrecInValid").css("display", "none");
}
function precioInvalido() {
    $("#precio").removeClass("is-valid");
    $("#precio").addClass("is-invalid");
    $("#PrecValid").css("display", "none");
    $("#PrecInValid").css("display", "block");
}
function ProveedorValido() {
    $("#Proveedor").removeClass("is-invalid");
    $("#Proveedor").addClass("is-valid");
    $("#ProvValid").css("display", "block");
    $("#ProvInValid").css("display", "none");
}
function ProveedorInvalido() {
    $("#Proveedor").removeClass("is-valid");
    $("#Proveedor").addClass("is-invalid");
    $("#ProvValid").css("display", "none");
    $("#ProvInValid").css("display", "block");
}
function LocalValido() {
    $("#Local").removeClass("is-invalid");
    $("#Local").addClass("is-valid");
    $("#LocValid").css("display", "block");
    $("#LocInValid").css("display", "none");
}
function LocalInvalido() {
    $("#Local").removeClass("is-valid");
    $("#Local").addClass("is-invalid");
    $("#LocValid").css("display", "none");
    $("#LocInValid").css("display", "block");
}
function EstadoCompraValido() {
    $("#EstadoCompra").removeClass("is-invalid");
    $("#EstadoCompra").addClass("is-valid");
    $("#EsCValid").css("display", "block");
    $("#EsCInValid").css("display", "none");
}
function EstadoCompraInvalido() {
    $("#EstadoCompra").removeClass("is-valid");
    $("#EstadoCompra").addClass("is-invalid");
    $("#EsCValid").css("display", "none");
    $("#EsCInValid").css("display", "block");
}
function FeVencCompraValido() {
    $("#FeVenc").removeClass("is-invalid");
    $("#FeVenc").addClass("is-valid");
    $("#FeVencValid").css("display", "block");
    $("#FeVencInValid").css("display", "none");
}
function FeVencCompraInvalido() {
    $("#FeVenc").removeClass("is-valid");
    $("#FeVenc").addClass("is-invalid");
    $("#FeVencValid").css("display", "none");
    $("#FeVencInValid").css("display", "block");
}