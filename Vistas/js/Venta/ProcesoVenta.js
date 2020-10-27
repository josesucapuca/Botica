var PrecTotal = 0;
$("#Presentacion").change(function () {
    ListarPrecioPorPre($("#Presentacion").val());
    ListaStockByIdProductoPresentacion($("#Presentacion").val());
});
function ListarPrecioPorPre(idp) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "ListarProductoPresentacionById", id: idp},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoCompra.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#precio").empty();
                for (var i = 0; i < jsonData.length; i++) {
                    $("#precio").val(financial(jsonData[i].Precio_Compra));
                }
            }
        }
    });
}
function ListaStockByIdProductoPresentacion(idp) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Stock.php',
        data: {opc: "ListaStockByIdProductoPresentacion", id: idp},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoCompra.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#Stock").css("display", "block");
                if (jsonData[0].Cant_Stock === "0") {
                    $("#st").val(jsonData[0].Cant_Stock);
                } else {
                    $("#st").val(jsonData[0].Cant_Stock);
                }
            }
        }
    });
}
$('#example tbody').on('dblclick', 'tr', function () {
    var t = $('#example').DataTable();
    var a = t.rows(this).data();
    PrecTotal = PrecTotal - a[0][6];
    $("#CantTotal").val(Number.parseFloat(PrecTotal).toFixed(2));
    t.row(':eq(' + t.row(this).index() + ')').remove().draw(false);
});
$("#btn_Registrar_Venta").click(function () {
    var a = $("#example").DataTable();
    if (a.rows().count() > 0) {
        ValidarCamposRegistrarVenta();
    } else {
        alert("Ingresar Todos los datos");
    }
});
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
$("#btn_Agregar").click(function () {
    var PR = $("#Producto").val();
    var PE = $("#Presentacion").val();
    var PC = $("#precio").val();
    var CT = $("#cantidad").val();
    if (PR !== "" && PE !== "" && PC !== "")
    {
        alert($("#st").val()+$("#cantidad").val());
        if (parseInt(CT)<=  parseInt($("#st").val())) {
            $("#ProInValid").css("display", "none");
            PresValido();
            precioValido();
            if (CT === "" || CT === "0") {
                CantInvalido();
                alert("Ingresar Cantidad de Producto");
            } else {
                $.ajax({
                    type: "POST",
                    url: '../Controlador/ProductoPresentacion.php',
                    data: {opc: "ListarProductoPresentacionById", id: $("#Presentacion").val()},
                    success: function (response)
                    {
                        if (response === null || response === "") {
                            alert("La lista esta vacia pre");
                            location.href = "ProcesoVenta.php";
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
            CantInvalido();
            if ($("#precio").val() === "") {
                precioInvalido();
            } else {
                precioValido();
            }
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
    }
});
function ListarPresentacion(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/ProductoPresentacion.php',
        data: {opc: "ListaProductoPresentacionIdProducto", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoVenta.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#Presentacion").empty();
                var html = "";
                if (jsonData.length > 1) {
                    $("#precio").val("");
                    html += "<option value=''>Seleccionar</option>";
                    for (var i = 0; i < jsonData.length; i++) {
                        html += "<option value='" + jsonData[i].id_Producto_Presentacion + "'>" + jsonData[i].No_Presentacion + "</option>";
                    }
                    $("#Stock").css("display", "none");
                    //alert(financial(jsonData[1].Precio_Compra))
                    //$("#precio").val(financial(jsonData[1].Precio_Compra));

                } else {
                    html += "<option value='" + jsonData[0].id_Producto_Presentacion + "' selected>" + jsonData[0].No_Presentacion + "</option>";
                    //alert(financial(jsonData[0].Precio_Compra))
                    $("#precio").val(financial(jsonData[0].Precio_Compra));
                    $("#Stock").css("display", "block");
                    ListaStockByIdProductoPresentacion(jsonData[0].id_Producto_Presentacion);
                }
                $("#Presentacion").append(html);
            }
        }
    });
}
function CPValido() {
    $("#CPValid").css("display", "block");
    $("#CPInValid").css("display", "none");
}
function CPInvalido() {
    $("#CPValid").css("display", "none");
    $("#CPInValid").css("display", "block");
}
function TipoVentaValido() {
    $("#TVValid").css("display", "block");
    $("#TVInValid").css("display", "none");
    $("#TipoVenta").addClass("is-valid");
    $("#TipoVenta").removeClass("is-invalid");
}
function TipoVentaInvalido() {
    $("#TVValid").css("display", "none");
    $("#TVInValid").css("display", "block");
    $("#TipoVenta").addClass("is-invalid");
    $("#TipoVenta").removeClass("is-valid");
}
function DNIValido() {
    $("#DNIValid").css("display", "block");
    $("#DNIInValid").css("display", "none");
    $("#DNI").addClass("is-valid");
    $("#DNI").removeClass("is-invalid");
}
function DNIInvalido() {
    $("#DNIValid").css("display", "none");
    $("#DNIInValid").css("display", "block");
    $("#DNI").addClass("is-invalid");
    $("#DNI").removeClass("is-valid");
}
function RUCValido() {
    $("#RUCValid").css("display", "block");
    $("#RUCInValid").css("display", "none");
    $("#RUC").addClass("is-valid");
    $("#RUC").removeClass("is-invalid");
}
function RUCInvalido() {
    $("#RUCValid").css("display", "none");
    $("#RUCInValid").css("display", "block");
    $("#RUC").addClass("is-invalid");
    $("#RUC").removeClass("is-valid");
}
function NPValido() {
    $("#NPValid").css("display", "block");
    $("#NPInValid").css("display", "none");
    $("#Nombre").addClass("is-valid");
    $("#Nombre").removeClass("is-invalid");
}
function NPInvalido() {
    $("#NPValid").css("display", "none");
    $("#NPInValid").css("display", "block");
    $("#Nombre").addClass("is-invalid");
    $("#Nombre").removeClass("is-valid");
}
function APValido() {
    $("#APValid").css("display", "block");
    $("#APInValid").css("display", "none");
    $("#Apellido").addClass("is-valid");
    $("#Apellido").removeClass("is-invalid");
}
function APInvalido() {
    $("#APValid").css("display", "none");
    $("#APInValid").css("display", "block");
    $("#Apellido").addClass("is-invalid");
    $("#Apellido").removeClass("is-valid");
}
function SPValido() {
    $("#SPValid").css("display", "block");
    $("#SPInValid").css("display", "none");
    $("#sexo").addClass("is-valid");
    $("#sexo").removeClass("is-invalid");
}
function SPInvalido() {
    $("#SPValid").css("display", "none");
    $("#SPInValid").css("display", "block");
    $("#sexo").addClass("is-invalid");
    $("#sexo").removeClass("is-valid");
}
function CEValido() {
    $("#CEValid").css("display", "block");
    $("#CEInValid").css("display", "none");
}
function CEInvalido() {
    $("#CEValid").css("display", "none");
    $("#CEInValid").css("display", "block");
}
function ENValido() {
    $("#ENValid").css("display", "block");
    $("#ENInValid").css("display", "none");
    $("#EmpN").addClass("is-valid");
    $("#EmpN").removeClass("is-invalid");
}
function ENInvalido() {
    $("#ENValid").css("display", "none");
    $("#ENInValid").css("display", "block");
    $("#EmpN").addClass("is-invalid");
    $("#EmpN").removeClass("is-valid");
}
function financial(x) {
    return Number.parseFloat(x).toFixed(2);
}
function ValidarCamposRegistrarVenta() {
    var CN = $('input:radio[name=prCliente]:checked').val();
    var CTP = $('input:radio[name=TiCliente]:checked').val();
    var TV = $("#TipoVenta").val();
    var CP = $("#ClienteP").val();
    var CE = $("#ClienteE").val();
    var EN = $("#EmpN").val();
    var NP = $("#Nombre").val();
    var AP = $("#Apellido").val();
    var SP = $("#sexo").val();
    var DNI = $("#DNI").val();
    var RUC = $("#RUC").val();
    var CT = $("#CantTotal").val();
    var UC = $("#UsuarioCreacion").val();
    var LC = $("#Local").val();

    if (CN === "Antiguo" && CTP === "1") {
        if (TV !== "") {
            if (TV === "1") {
                if (CP !== "" && DNI !== "")
                {
                    RegistrarVenta(CN, CTP, TV, CP, NP, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (CP !== "") {
                        CPValido();
                    } else {
                        CPInvalido();
                    }
                    if (DNI !== "") {
                        DNIValido();
                    } else {
                        DNIInvalido();
                    }
                }
            }
            if (TV === "2") {
                if (CP !== "" && DNI !== "" && RUC !== "") {

                    RegistrarVenta(CN, CTP, TV, CP, NP, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (CP !== "") {
                        CPValido();
                    } else {
                        CPInvalido();
                    }
                    if (DNI !== "") {
                        DNIValido();
                    } else {
                        DNIInvalido();
                    }
                    if (RUC !== "") {
                        RUCValido();
                    } else {
                        RUCInvalido();
                    }
                }
            }
        } else {
            if (CP !== "") {
                CPValido();
            } else {
                CPInvalido();
            }
            if (DNI !== "") {
                DNIValido();
            } else {
                DNIInvalido();
            }
            TipoVentaInvalido();
        }
    }
    if (CN === "Nuevo" && CTP === "1") {
        if (TV !== "") {
            if (TV === "1") {

                if (NP !== "" && AP !== "" && SP !== "" && DNI !== "")
                {
                    RegistrarVenta(CN, CTP, TV, 0, NP, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (NP !== "") {
                        NPValido();
                    } else {
                        NPInvalido();
                    }
                    if (AP !== "") {
                        APValido();
                    } else {
                        APInvalido();
                    }
                    if (SP !== "") {
                        SPValido();
                    } else {
                        SPInvalido();
                    }
                    if (DNI !== "") {
                        DNIValido();
                    } else {
                        DNIInvalido();
                    }
                    TipoVentaValido();
                }
            }
            if (TV === "2") {
                if (NP !== "" && AP !== "" && SP !== "" && DNI !== "" && RUC !== "") {

                    RegistrarVenta(CN, CTP, TV, 0, NP, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (NP !== "") {
                        NPValido();
                    } else {
                        NPInvalido();
                    }
                    if (AP !== "") {
                        APValido();
                    } else {
                        APInvalido();
                    }
                    if (SP !== "") {
                        SPValido();
                    } else {
                        SPInvalido();
                    }
                    if (DNI !== "") {
                        DNIValido();
                    } else {
                        DNIInvalido();
                    }
                    if (RUC !== "") {
                        RUCValido();
                    } else {
                        RUCInvalido();
                    }
                }
            }
        } else {
            if (NP !== "") {
                NPValido();
            } else {
                NPInvalido();
            }
            if (AP !== "") {
                APValido();
            } else {
                APInvalido();
            }
            if (SP !== "") {
                SPValido();
            } else {
                SPInvalido();
            }
            if (DNI !== "") {
                DNIValido();
            } else {
                DNIInvalido();
            }
            TipoVentaInvalido();
        }
    }
    if (CN === "Antiguo" && CTP === "2") {
        if (TV !== "") {
            if (TV === "1") {
                if (CE !== "" && RUC !== "")
                {
                    RegistrarVenta(CN, CTP, TV, CE, NP, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (CE !== "") {
                        CEValido();
                    } else {
                        CEInvalido();
                    }
                    if (RUC !== "") {
                        RUCValido();
                    } else {
                        RUCInvalido();
                    }
                    TipoVentaValido();
                }
            }
            if (TV === "2") {
                if (CE !== "" && RUC !== "") {

                    RegistrarVenta(CN, CTP, TV, CE, NP, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (CE !== "") {
                        CEValido();
                    } else {
                        CEInvalido();
                    }
                    if (RUC !== "") {
                        RUCValido();
                    } else {
                        RUCInvalido();
                    }
                    TipoVentaValido();
                }
            }
        } else {
            if (CE !== "") {
                CEValido();
            } else {
                CEInvalido();
            }
            if (RUC !== "") {
                RUCValido();
            } else {
                RUCInvalido();
            }
            TipoVentaInvalido();
        }
    }
    if (CN === "Nuevo" && CTP === "2") {
        if (TV !== "") {
            if (TV === "1") {
                if (EN !== "" && RUC !== "")
                {
                    RegistrarVenta(CN, CTP, TV, CE, EN, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (EN !== "") {
                        ENValido();
                    } else {
                        ENInvalido();
                    }
                    if (RUC !== "") {
                        RUCValido();
                    } else {
                        RUCInvalido();
                    }
                    TipoVentaValido();
                }
            }
            if (TV === "2") {
                if (EN !== "" && RUC !== "") {
                    RegistrarVenta(CN, CTP, TV, CE, EN, AP, DNI, SP, RUC, CT, UC, LC);

                } else {
                    if (EN !== "") {
                        ENValido();
                    } else {
                        ENInvalido();
                    }
                    if (RUC !== "") {
                        RUCValido();
                    } else {
                        RUCInvalido();
                    }
                    TipoVentaValido();
                }
            }
        } else {
            if (EN !== "") {
                ENValido();
            } else {
                ENInvalido();
            }
            if (RUC !== "") {
                RUCValido();
            } else {
                RUCInvalido();
            }
            TipoVentaInvalido();
        }
    }
}
function RegistrarVenta(CC, TC, TV, CL, NC, AC, DC, SC, RC, CT, UC, LC) {

    $.ajax({
        type: "POST",
        url: '../Controlador/Venta.php',
        data: {opc: "IngresarClienteVenta",
            CC: CC, TC: TC, TV: TV, CL: CL, NC: NC, AC: AC,
            DC: DC, SC: SC, RC: RC, CT: CT, UC: UC, LC: LC},
        success: function (response)
        {
            var jsonData = JSON.parse(response);
            if (jsonData[0].id > 0) {
                var a = $("#example").DataTable();
                var t = a.rows().data();
                for (var i = 0; i < a.rows().count(); i++) {
                    RegistrarDetalleVenta(t[i][5], t[i][4], t[i][6], jsonData[0].id, t[i][1]);
                }
                location.href = "ImprimirVenta.php?id=" + jsonData[0].id;
            } else {
                alert("No se Registro Correctamente");
            }
        }
    });
}
function RegistrarDetalleVenta(PP, CP, PT, IV, IPP) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Venta.php',
        data: {opc: "IngresarDetalleVenta",
            PP: PP, CP: CP, PT: PT, IV: IV, IPP: IPP},
        success: function (response)
        {
        }
    });
}
function ListarClienteById(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Cliente.php',
        data: {opc: "ListarClienteById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "ProcesoVenta.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#DNI").val(jsonData[0].Dni_Cliente);
                $("#RUC").val(jsonData[0].RUC);
            }
        }
    });
}
