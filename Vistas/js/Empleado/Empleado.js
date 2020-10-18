
ListarDistrito();
$("#btn_Enviar").click(function () {

    ValidarFormIngrsar();
});
$("#btn_Enviar_Mod").click(function () {
    ValidarFormModificacion();

});

function ListarLocal(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Local.php',
        data: {opc: "ListarLocalByEmpresa", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "CRUD_Empleado.php";
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
                $("#LocalEmpleado").append(html);
                $("#LocalEmpleadoMod").append(html);
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
                location.href = "CRUD_Empleado.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {

                    html += '<option class="alert alert-success" value="' + jsonData[i].id_Distrito + '">' + jsonData[i].No_Distrito + '</option>'

                }
                $("#DistritoEmpleado").append(html);
                $("#DistritoEmpleadoMod").append(html);
            }
        }
    });
}
function InsertarProveedor() {

    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: $("#FormIngresarEmpleado").serialize(),
        success: function (response)
        {
            alert(response);

            if (response) {
                alert("Fue Ingresado exitosamente");
                location.href = "CRUD_Empleados.php";
            } else {
                alert("Problemas con la session vuelva a ingresar");
                location.href = "CRUD_Empleados.php";
            }
        }
    });
}
function ModificarLlenarEmp(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: {opc: "ListarEmpleadoById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Empleado.php";
            } else {
                var jsonData = JSON.parse(response);

                for (var i = 0; i < jsonData.length; i++) {
                    $("#NombreEmpleadoMod").val(jsonData[i].No_Empleado);
                    $("#id_Emp").val(jsonData[i].id_Empleado);
                    $("#ApellidoEmpleadoMod").val(jsonData[i].Ape_Empleado);
                    $("#CargoEmpleadoMod").val(jsonData[i].Cargo_Empleado);
                    $("#EstadoEmpleadoMod option[value='" + jsonData[i].Es_Empleado + "']").attr("selected", true);
                    $("#EdadEmpleadoMod").val(jsonData[i].Edad_Empleado);
                    $("#DireccionEmpleadoMod").val(jsonData[i].Dir_Empleado);
                    $("#TelefonoEmpleadoMod").val(jsonData[i].Te_Empleado);
                    $("#CelularEmpleadoMod").val(jsonData[i].Cel_Empleado);
                    $("#LocalEmpleadoMod option[value='" + jsonData[i].id_Local + "']").attr("selected", true);
                    $("#DistritoEmpleadoMod option[value='" + jsonData[i].id_Distrito + "']").attr("selected", true);
                    $("#FechaIngresoMod").val(jsonData[i].Fe_Ingreso);
                    $("#ClaveEmpleadoMod").val(jsonData[i].Clave_Empleado);
                    $("#SexoEmpleadoMod option[value='" + jsonData[i].Sexo_Empleado + "']").attr("selected", true);
                    $("#FechaSalidaMod").val(jsonData[i].fe_Salida);
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}
function ModificarPro() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: $('#FormModificarEmpleado').serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "CRUD_Empleados.php";
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

    var NombreEmpleado = $("#NombreEmpleado");
    var ApellidoEmpleado = $("#ApellidoEmpleado");
    var CargoEmpleado = $("#CargoEmpleado");
    var EstadoEmpleado = $("#EstadoEmpleado");
    var EdadEmpleado = $("#EdadEmpleado");
    var DireccionEmpleado = $("#DireccionEmpleado");
    var TelefonoEmpleado = $("#TelefonoEmpleado");
    var CelularEmpleado = $("#CelularEmpleado");
    var LocalEmpleado = $("#LocalEmpleado");
    var DistritoEmpleado = $("#DistritoEmpleado");
    var FechaIngreso = $("#FechaIngreso");
    var ClaveEmpleado = $("#ClaveEmpleado");
    var SexoEmpleado = $("#SexoEmpleado");
    var FechaSalida = $("#FechaSalida");

    if (NombreEmpleado.val() !== "" && ApellidoEmpleado.val() !== "" &&
            CargoEmpleado.val() !== "" && EstadoEmpleado.val() !== "" &&
            EdadEmpleado.val() !== "" && DireccionEmpleado.val() !== "" &&
            TelefonoEmpleado.val() !== "" && CelularEmpleado.val() !== "" &&
            LocalEmpleado.val() !== "" && DistritoEmpleado.val() !== "" &&
            FechaIngreso.val() !== "" && ClaveEmpleado.val() !== "" &&
            SexoEmpleado.val() !== "" && FechaSalida.val() !== "") {
        InsertarProveedor();
    } else {
        if (NombreEmpleado.val() !== "") {
            document.getElementById("NombreEmpleado").className = "form-control is-valid";
            document.getElementById("NoValid").style = "display:block;";
            document.getElementById("NoInValid").style = "display:none;";
        } else {
            document.getElementById("NombreEmpleado").className = "form-control is-invalid";
            document.getElementById("NoValid").style = "display:none;";
            document.getElementById("NoInValid").style = "display:block;";
        }
        if (ApellidoEmpleado.val() !== "") {
            document.getElementById("ApellidoEmpleado").className = "form-control is-valid";
            document.getElementById("ApValid").style = "display:block;";
            document.getElementById("ApInValid").style = "display:none;";
        } else {
            document.getElementById("ApellidoEmpleado").className = "form-control is-invalid";
            document.getElementById("ApValid").style = "display:none;";
            document.getElementById("ApInValid").style = "display:block;";
        }
        if (CargoEmpleado.val() !== "") {
            document.getElementById("CargoEmpleado").className = "form-control is-valid";
            document.getElementById("CaValid").style = "display:block;";
            document.getElementById("CaInValid").style = "display:none;";
        } else {
            document.getElementById("CargoEmpleado").className = "form-control is-invalid";
            document.getElementById("CaValid").style = "display:none;";
            document.getElementById("CaInValid").style = "display:block;";
        }
        if (EstadoEmpleado.val() !== "") {
            document.getElementById("EstadoEmpleado").className = "form-control is-valid";
            document.getElementById("EsValid").style = "display:block;";
            document.getElementById("EsInValid").style = "display:none;";
        } else {
            document.getElementById("EstadoEmpleado").className = "form-control is-invalid";
            document.getElementById("EsValid").style = "display:none;";
            document.getElementById("EsInValid").style = "display:block;";
        }
        if (EdadEmpleado.val() !== "") {
            document.getElementById("EdadEmpleado").className = "form-control is-valid";
            document.getElementById("EdadValid").style = "display:block;";
            document.getElementById("EdadInValid").style = "display:none;";
        } else {
            document.getElementById("EdadEmpleado").className = "form-control is-invalid";
            document.getElementById("EdadValid").style = "display:none;";
            document.getElementById("EdadInValid").style = "display:block;";
        }
        if (DireccionEmpleado.val() !== "") {
            document.getElementById("DireccionEmpleado").className = "form-control is-valid";
            document.getElementById("DirValid").style = "display:block;";
            document.getElementById("DirInValid").style = "display:none;";
        } else {
            document.getElementById("DireccionEmpleado").className = "form-control is-invalid";
            document.getElementById("DirValid").style = "display:none;";
            document.getElementById("DirInValid").style = "display:block;";
        }
        if (TelefonoEmpleado.val() !== "") {
            document.getElementById("TelefonoEmpleado").className = "form-control is-valid";
            document.getElementById("TelValid").style = "display:block;";
            document.getElementById("TelInValid").style = "display:none;";
        } else {
            document.getElementById("TelefonoEmpleado").className = "form-control is-invalid";
            document.getElementById("TelValid").style = "display:none;";
            document.getElementById("TelInValid").style = "display:block;";
        }
        if (CelularEmpleado.val() !== "") {
            document.getElementById("CelularEmpleado").className = "form-control is-valid";
            document.getElementById("CelValid").style = "display:block;";
            document.getElementById("CelInValid").style = "display:none;";
        } else {
            document.getElementById("CelularEmpleado").className = "form-control is-invalid";
            document.getElementById("CelValid").style = "display:none;";
            document.getElementById("CelInValid").style = "display:block;";
        }
        if (LocalEmpleado.val() !== "") {
            document.getElementById("LocalEmpleado").className = "form-control is-valid";
            document.getElementById("LocValid").style = "display:block;";
            document.getElementById("LocInValid").style = "display:none;";
        } else {
            document.getElementById("LocalEmpleado").className = "form-control is-invalid";
            document.getElementById("LocValid").style = "display:none;";
            document.getElementById("LocInValid").style = "display:block;";
        }
        if (DistritoEmpleado.val() !== "") {
            document.getElementById("DistritoEmpleado").className = "form-control is-valid";
            document.getElementById("DisValid").style = "display:block;";
            document.getElementById("DisInValid").style = "display:none;";
        } else {
            document.getElementById("DistritoEmpleado").className = "form-control is-invalid";
            document.getElementById("DisValid").style = "display:none;";
            document.getElementById("DisInValid").style = "display:block;";
        }
        if (FechaIngreso.val() !== "") {
            document.getElementById("FechaIngreso").className = "form-control is-valid";
            document.getElementById("FecIValid").style = "display:block;";
            document.getElementById("FecIInvalid").style = "display:none;";
        } else {
            document.getElementById("FechaIngreso").className = "form-control is-invalid";
            document.getElementById("FecIValid").style = "display:none;";
            document.getElementById("FecIInvalid").style = "display:block;";
        }
        if (ClaveEmpleado.val() !== "") {
            document.getElementById("ClaveEmpleado").className = "form-control is-valid";
            document.getElementById("ClaValid").style = "display:block;";
            document.getElementById("ClaInValid").style = "display:none;";
        } else {
            document.getElementById("ClaveEmpleado").className = "form-control is-invalid";
            document.getElementById("ClaValid").style = "display:none;";
            document.getElementById("ClaInValid").style = "display:block;";
        }
        if (SexoEmpleado.val() !== "") {
            document.getElementById("SexoEmpleado").className = "form-control is-valid";
            document.getElementById("SexValid").style = "display:block;";
            document.getElementById("SexInValid").style = "display:none;";
        } else {
            document.getElementById("SexoEmpleado").className = "form-control is-invalid";
            document.getElementById("SexValid").style = "display:none;";
            document.getElementById("SexInValid").style = "display:block;";
        }
    }
}
function ValidarFormModificacion() {
    var NombreEmpleadoMod = $("#NombreEmpleadoMod");
    var ApellidoEmpleadoMod = $("#ApellidoEmpleadoMod");
    var CargoEmpleadoMod = $("#CargoEmpleadoMod");
    var EstadoEmpleadoMod = $("#EstadoEmpleadoMod");
    var EdadEmpleadoMod = $("#EdadEmpleadoMod");
    var DireccionEmpleadoMod = $("#DireccionEmpleadoMod");
    var TelefonoEmpleadoMod = $("#TelefonoEmpleadoMod");
    var CelularEmpleadoMod = $("#CelularEmpleadoMod");
    var LocalEmpleadoMod = $("#LocalEmpleadoMod");
    var DistritoEmpleadoMod = $("#DistritoEmpleadoMod");
    var FechaIngresoMod = $("#FechaIngresoMod");
    var ClaveEmpleadoMod = $("#ClaveEmpleadoMod");
    var SexoEmpleadoMod = $("#SexoEmpleadoMod");

    if (NombreEmpleadoMod.val() !== "" && ApellidoEmpleadoMod.val() !== "" &&
            CargoEmpleadoMod.val() !== "" && EstadoEmpleadoMod.val() !== "" &&
            EdadEmpleadoMod.val() !== "" && DireccionEmpleadoMod.val() !== "" &&
            TelefonoEmpleadoMod.val() !== "" && CelularEmpleadoMod.val() !== "" &&
            LocalEmpleadoMod.val() !== "" && DistritoEmpleadoMod.val() !== "" &&
            FechaIngresoMod.val() !== "" && ClaveEmpleadoMod.val() !== "" &&
            SexoEmpleadoMod.val() !== "") {
        ModificarPro();
    } else {
        if (NombreEmpleadoMod.val() !== "") {
            document.getElementById("NombreEmpleado").className = "form-control is-valid";
            document.getElementById("NoValidMod").style = "display:block;";
            document.getElementById("NoInValidMod").style = "display:none;";
        } else {
            document.getElementById("NombreEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("NoValidMod").style = "display:none;";
            document.getElementById("NoInValidMod").style = "display:block;";
        }
        if (ApellidoEmpleadoMod.val() !== "") {
            document.getElementById("ApellidoEmpleadoMod").className = "form-control is-valid";
            document.getElementById("ApValidMod").style = "display:block;";
            document.getElementById("ApInValidMod").style = "display:none;";
        } else {
            document.getElementById("ApellidoEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("ApValidMod").style = "display:none;";
            document.getElementById("ApInValidMod").style = "display:block;";
        }
        if (CargoEmpleadoMod.val() !== "") {
            document.getElementById("CargoEmpleadoMod").className = "form-control is-valid";
            document.getElementById("CaValidMod").style = "display:block;";
            document.getElementById("CaInValidMod").style = "display:none;";
        } else {
            document.getElementById("CargoEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("CaValidMod").style = "display:none;";
            document.getElementById("CaInValidMod").style = "display:block;";
        }
        if (EstadoEmpleadoMod.val() !== "") {
            document.getElementById("EstadoEmpleadoMod").className = "form-control is-valid";
            document.getElementById("EsValidMod").style = "display:block;";
            document.getElementById("EsInValidMod").style = "display:none;";
        } else {
            document.getElementById("EstadoEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("EsValidMod").style = "display:none;";
            document.getElementById("EsInValidMod").style = "display:block;";
        }
        if (EdadEmpleadoMod.val() !== "") {
            document.getElementById("EdadEmpleadoMod").className = "form-control is-valid";
            document.getElementById("EdadValidMod").style = "display:block;";
            document.getElementById("EdadInValidMod").style = "display:none;";
        } else {
            document.getElementById("EdadEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("EdadValidMod").style = "display:none;";
            document.getElementById("EdadInValidMod").style = "display:block;";
        }
        if (DireccionEmpleadoMod.val() !== "") {
            document.getElementById("DireccionEmpleadoMod").className = "form-control is-valid";
            document.getElementById("DirValidMod").style = "display:block;";
            document.getElementById("DirInValidMod").style = "display:none;";
        } else {
            document.getElementById("DireccionEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("DirValidMod").style = "display:none;";
            document.getElementById("DirInValidMod").style = "display:block;";
        }
        if (TelefonoEmpleadoMod.val() !== "") {
            document.getElementById("TelefonoEmpleadoMod").className = "form-control is-valid";
            document.getElementById("TelValidMod").style = "display:block;";
            document.getElementById("TelInValidMod").style = "display:none;";
        } else {
            document.getElementById("TelefonoEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("TelValidMod").style = "display:none;";
            document.getElementById("TelInValidMod").style = "display:block;";
        }
        if (CelularEmpleadoMod.val() !== "") {
            document.getElementById("CelularEmpleadoMod").className = "form-control is-valid";
            document.getElementById("CelValidMod").style = "display:block;";
            document.getElementById("CelInValidMod").style = "display:none;";
        } else {
            document.getElementById("CelularEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("CelValidMod").style = "display:none;";
            document.getElementById("CelInValidMod").style = "display:block;";
        }
        if (LocalEmpleadoMod.val() !== "") {
            document.getElementById("LocalEmpleadoMod").className = "form-control is-valid";
            document.getElementById("LocValidMod").style = "display:block;";
            document.getElementById("LocInValidMod").style = "display:none;";
        } else {
            document.getElementById("LocalEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("LocValidMod").style = "display:none;";
            document.getElementById("LocInValidMod").style = "display:block;";
        }
        if (DistritoEmpleadoMod.val() !== "") {
            document.getElementById("DistritoEmpleadoMod").className = "form-control is-valid";
            document.getElementById("DisValidMod").style = "display:block;";
            document.getElementById("DisInValidMod").style = "display:none;";
        } else {
            document.getElementById("DistritoEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("DisValidMod").style = "display:none;";
            document.getElementById("DisInValidMod").style = "display:block;";
        }
        if (FechaIngresoMod.val() !== "") {
            document.getElementById("FechaIngresoMod").className = "form-control is-valid";
            document.getElementById("FecIValidMod").style = "display:block;";
            document.getElementById("FecIInvalidMod").style = "display:none;";
        } else {
            document.getElementById("FechaIngresoMod").className = "form-control is-invalid";
            document.getElementById("FecIValidMod").style = "display:none;";
            document.getElementById("FecIInvalidMod").style = "display:block;";
        }
        if (ClaveEmpleadoMod.val() !== "") {
            document.getElementById("ClaveEmpleadoMod").className = "form-control is-valid";
            document.getElementById("ClaValidMod").style = "display:block;";
            document.getElementById("ClaInValidMod").style = "display:none;";
        } else {
            document.getElementById("ClaveEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("ClaValidMod").style = "display:none;";
            document.getElementById("ClaInValidMod").style = "display:block;";
        }
        if (SexoEmpleadoMod.val() !== "") {
            document.getElementById("SexoEmpleadoMod").className = "form-control is-valid";
            document.getElementById("SexValidMod").style = "display:block;";
            document.getElementById("SexInValidMod").style = "display:none;";
        } else {
            document.getElementById("SexoEmpleadoMod").className = "form-control is-invalid";
            document.getElementById("SexValidMod").style = "display:none;";
            document.getElementById("SexInValidMod").style = "display:block;";
        }

    }

}
function DesactivarEmpleado(idp, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: {opc: "DesactivarEmpleado", id: idp, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Empleados.php";
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
function ActivarEmpleado(idp, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: {opc: "ActivarEmpleado", id: idp, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Empleados.php";
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

function DatEmp(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: {opc: "ListarEmpleadoById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Proveedor.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#InfLocalEmpleado").empty();
                $("#InfDistritoEmpleado").empty();
                $("#InfClaveEmpleado").empty();
                $("#InfUsuarioAsignado").empty();
                $("#InfFechaIngreso").empty();
                $("#InfFechaSalida").empty();
                $("#InfUsuarioCreacion").empty();
                $("#InfEmpleadoCreacion").empty();
                $("#InfUsuarioModificacion").empty();
                $("#InfEmpleadoModificacion").empty();
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].No_Local !== null || jsonData[i].No_Local !== "") {
                        $("#InfLocalEmpleado").append(jsonData[i].No_Local);
                    } else {
                        $("#InfLocalEmpleado").append("No Registrado");
                    }
                    if (jsonData[i].No_Distrito !== "" || jsonData[i].No_Distrito !== null) {
                        $("#InfDistritoEmpleado").append(jsonData[i].No_Distrito);
                    } else {
                        $("#InfDistritoEmpleado").append("No Registrado");
                    }
                    if (jsonData[i].Clave_Empleado !== null) {
                        $("#InfClaveEmpleado").append(jsonData[i].Clave_Empleado);
                    } else {
                        $("#InfClaveEmpleado").append("No Registrado");
                    }
                    if (jsonData[i].Usuario !== null) {
                        $("#InfUsuarioAsignado").append(jsonData[i].Usuario);
                    } else {
                        $("#InfUsuarioAsignado").append("Sin Un Usuario");
                    }
                    if (jsonData[i].Fe_Ingreso !== "") {
                        $("#InfFechaIngreso").append(jsonData[i].Fe_Ingreso);
                    } else {
                        $("#InfFechaIngreso").append("No Registrado");
                    }
                    if (jsonData[i].fe_Salida !== null) {
                        $("#InfFechaSalida").append(jsonData[i].fe_Salida);
                    } else {
                        $("#InfFechaSalida").append("No Registrado");
                    }
                    if (jsonData[i].Usuario_Creacion !== null) {
                        $("#InfUsuarioCreacion").append(jsonData[i].Usuario_Creacion);
                    } else {
                        $("#InfUsuarioCreacion").append("No Registrado");
                    }
                    if (jsonData[i].Usuario_Modificacion !== null) {
                        $("#InfUsuarioModificacion").append(jsonData[i].Usuario_Modificacion);
                    } else {
                        $("#InfUsuarioModificacion").append("Aun No Modificado");
                    }
                }
            }
            //location.href = "CRUD_Categorias.php";
        }


    });
}
