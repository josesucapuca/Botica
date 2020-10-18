
ListarDistrito();
$("#btn_Enviar").click(function () {

    ValidarFormIngrsar();
});
$("#btn_Enviar_Mod").click(function () {
    ValidarFormModificacion();

});
$('#iProveedor').keypress(function (e) {
    if (e.which === 13) {
        ModificarPro();
    }
});
$('#iProveedorMod').keypress(function (e) {
    if (e.which === 13) {
        ModificarPro();
    }
});
function ListarLocal(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Local.php',
        data: {opc: "ListarLocalByEmpresa",id:id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "CRUD_Proveedor.php";
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
function ListarDistrito() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Distrito.php',
        data: {opc: "ListarDistrito"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "CRUD_Proveedor.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {

                    html += '<option class="alert alert-success" value="' + jsonData[i].id_Distrito + '">' + jsonData[i].No_Distrito + '</option>'

                }
                $("#Distrito").append(html);
                $("#DistritoMod").append(html);
            }
        }
    });
}
function InsertarProveedor() {

    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: $("#FormIngresarPro").serialize(),
        success: function (response)
        {
            if (response) {
                alert("Fue Ingresado exitosamente");
                location.href = "CRUD_Proveedor.php";
            } else {
                alert("Problemas con la session vuelva a ingresar");
                location.href = "CRUD_Proveedor.php";
            }
        }
    });
}
function ModificarLlenarPro(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "ListarProveedorbyid", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Proveedor.php";
            } else {
                var jsonData = JSON.parse(response);

                for (var i = 0; i < jsonData.length; i++) {
                    $("#iProveedorMod").val(jsonData[i].No_Proveedor);
                    $("#id_pro").val(jsonData[i].id_Proveedor);

                    $("#iEstadoProMod option[value='" + jsonData[i].Es_Proveedor + "']").attr("selected", true);
                    $("#DireccionMod").val(jsonData[i].Dir_Proveedor);
                    $("#TelefonoMod").val(jsonData[i].Tel_Proveedor);
                    $("#CelularMod").val(jsonData[i].Cel_Proveedor);
                    $("#LocalMod option[value='" + jsonData[i].id_Local + "']").attr("selected", true);
                    $("#DistritoMod option[value='" + jsonData[i].id_Distrito + "']").attr("selected", true);
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}
function ModificarPro() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: $('#FormModificarPro').serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "CRUD_Proveedor.php";
            } else {
                alert("Hubo un Error al Modificar")
            }

            //$("#closemod").click();
            //alert(response)
            /*if (response === "true") {
             setTimeout(function () {
             $("#Alertsucces").fadeOut(1500);
             }, 3000);
             } else {
             setTimeout(function () {
             $("#Alertsucces").fadeOut(1500);
             }, 3000);
             //location.href = "CRUD_Categorias.php";
             }*/

        }
    });
}

function ValidarFormIngrsar() {

    var pro = $("#iProveedor");
    var Estpro = $("#iEstadoProveedor");
    var dir = $("#Direccion");
    var tel = $("#Telefono");
    var cel = $("#Celular");
    var local = $("#Local");
    var Dis = $("#Distrito");

    if (pro.val() !== "" && Estpro.val() !== "" && dir.val() !== "" && tel.val() !== "" &&
            cel.val() !== "" && local.val() !== "" && Dis.val() !== "") {

        InsertarProveedor();
    } else {
        if (pro.val() !== "") {
            document.getElementById("iProveedor").className = "form-control is-valid";
            document.getElementById("ProValid").style = "display:block;";
            document.getElementById("ProInValid").style = "display:none;";
        } else {
            document.getElementById("iProveedor").className = "form-control is-invalid";
            document.getElementById("ProValid").style = "display:none;";
            document.getElementById("ProInValid").style = "display:block;";
        }
        if (Estpro.val() !== "") {
            document.getElementById("iEstadoProveedor").className = "form-control is-valid";
            document.getElementById("EsValid").style = "display:block;";
            document.getElementById("EsInValid").style = "display:none;";
        } else {
            document.getElementById("iEstadoProveedor").className = "form-control is-invalid";
            document.getElementById("EsValid").style = "display:none;";
            document.getElementById("EsInValid").style = "display:block;";
        }
        if (dir.val() !== "") {
            document.getElementById("Direccion").className = "form-control is-valid";
            document.getElementById("DirValid").style = "display:block;";
            document.getElementById("DirInValid").style = "display:none;";
        } else {
            document.getElementById("Direccion").className = "form-control is-invalid";
            document.getElementById("DirValid").style = "display:none;";
            document.getElementById("DirInValid").style = "display:block;";
        }
        if (tel.val() !== "") {
            document.getElementById("Telefono").className = "form-control is-valid";
            document.getElementById("TelValid").style = "display:block;";
            document.getElementById("TelInValid").style = "display:none;";
        } else {
            document.getElementById("Telefono").className = "form-control is-invalid";
            document.getElementById("TelValid").style = "display:none;";
            document.getElementById("TelInValid").style = "display:block;";
        }
        if (cel.val() !== "") {
            document.getElementById("Celular").className = "form-control is-valid";
            document.getElementById("CelValid").style = "display:block;";
            document.getElementById("CelInValid").style = "display:none;";
        } else {
            document.getElementById("Celular").className = "form-control is-invalid";
            document.getElementById("CelValid").style = "display:none;";
            document.getElementById("CelInValid").style = "display:block;";
        }
        if (local.val() !== "") {
            document.getElementById("Local").className = "form-control is-valid";
            document.getElementById("LocValid").style = "display:block;";
            document.getElementById("LocInValid").style = "display:none;";
        } else {
            document.getElementById("Local").className = "form-control is-invalid";
            document.getElementById("LocValid").style = "display:none;";
            document.getElementById("LocInValid").style = "display:block;";
        }
        if (Dis.val() !== "") {
            document.getElementById("Distrito").className = "form-control is-valid";
            document.getElementById("DisValid").style = "display:block;";
            document.getElementById("DisInValid").style = "display:none;";
        } else {
            document.getElementById("Distrito").className = "form-control is-invalid";
            document.getElementById("DisValid").style = "display:none;";
            document.getElementById("DisInValid").style = "display:block;";
        }

    }

}
function ValidarFormModificacion() {
    var pro = $("#iProveedorMod");
    var Estpro = $("#iEstadoProMod");
    var dir = $("#DireccionMod");
    var tel = $("#TelefonoMod");
    var cel = $("#CelularMod");
    var local = $("#LocalMod");
    var Dis = $("#DistritoMod")

    if (pro.val() !== "" && Estpro.val() !== "") {
        ModificarPro();
    } else {
        if (pro.val() !== "") {
            document.getElementById("iPresentacionMod").className = "form-control is-valid";
            document.getElementById("ProValidMod").style = "display:block;";
            document.getElementById("ProInValidMod").style = "display:none;";
        } else {
            document.getElementById("iPresentacionMod").className = "form-control is-invalid";
            document.getElementById("ProValidMod").style = "display:none;";
            document.getElementById("ProInValidMod").style = "display:block;";
        }
        if (Estpro.val() !== "") {
            document.getElementById("iEstadoPreMod").className = "form-control is-valid";
            document.getElementById("ProEsValidMod").style = "display:block;";
            document.getElementById("PrEsInValidMod").style = "display:none;";
        } else {
            document.getElementById("iEstadoPreMod").className = "form-control is-invalid";
            document.getElementById("ProEsValidMod").style = "display:none;";
            document.getElementById("PrEsInValidMod").style = "display:block;";
        }

    }

}
function DesactivarProveedor(idp, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "DesactivarProveedor", idPro: idp, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Proveedor.php";
            //$("#closemod").click();
            //alert(response)
            /*if (response === "true") {
             setTimeout(function () {
             $("#Alertsucces").fadeOut(1500);
             }, 3000);
             } else {
             setTimeout(function () {
             $("#Alertsucces").fadeOut(1500);
             }, 3000);
             //location.href = "CRUD_Categorias.php";
             }*/

        }
    });
}
function ActivarProveedor(idp, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "ActivarProveedor", idPro: idp, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Proveedor.php";
            //$("#closemod").click();
            //alert(response)
            /*if (response === "true") {
             setTimeout(function () {
             $("#Alertsucces").fadeOut(1500);
             }, 3000);
             } else {
             setTimeout(function () {
             $("#Alertsucces").fadeOut(1500);
             }, 3000);
             //location.href = "CRUD_Categorias.php";
             }*/

        }
    });
}

function DatProvee(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "ListarProveedorbyid", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Proveedor.php";
            } else {
                var jsonData = JSON.parse(response);

                for (var i = 0; i < jsonData.length; i++) {
                    $("#Usu_Creacion").empty();
                    $("#Empleado_Creacion").empty();
                    $("#Usu_Mod").empty();
                    $("#Empleado_Mod").empty();
                    $("#Usu_Creacion").append(jsonData[i].Usuario_Creacion);
                    $("#Empleado_Creacion").append(jsonData[i].Empleado_Creacion);

                    $("#Usu_Mod").append(jsonData[i].Usuario_Modificacion);
                    $("#Empleado_Mod").append(jsonData[i].Empleado_Modificacion);
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}
