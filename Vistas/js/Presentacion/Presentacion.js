$("#btn_Enviar").click(function () {

    ValidarFormIngrsar();
});
$("#btn_Enviar_Mod").click(function () {
    ValidarFormModificacion();

});
$('#iPresentacionMod').keypress(function (e) {
    if (e.which === 13) {
        ModificarPre();
    }
});
$('#iPresentacion').keypress(function (e) {
    if (e.which === 13) {
        ModificarPre();
    }
});
function InsertarPresentacion() {

    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: $("#FormIngresarPre").serialize(),
        success: function (response)
        {
            if (response) {
                alert("Fue Ingresado exitosamente");
                location.href = "CRUD_Presentacion.php";
            } else {
                alert("Problemas con la session vuelva a ingresar");
                location.href = "CRUD_Presentacion.php";
            }
        }
    });
}
function ModificarLlenarPre(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: {opc: "ListarPresentacionbyid", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Presentacion.php";
            } else {
                var jsonData = JSON.parse(response);
                
                for (var i = 0; i < jsonData.length; i++) {
                    $("#iPresentacionMod").val(jsonData[i].No_Presentacion);
                    $("#id_pre").val(jsonData[i].id_Presentacion);
                    if (jsonData[i].Es_Presentacion === "1") {
                        $("#iEstadoPreMod option[value='1']").attr("selected", true);
                    } else {
                        $("#iEstadoPreMod option[value='0']").attr("selected", true);
                    }
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}
function ModificarPre() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: $('#FormModificarPre').serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "CRUD_Presentacion.php";
            } else {
                alert(response)                
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

    var pre = $("#iPresentacion");
    var Estpre = $("#iEstadoPre");

    if (pre.val() !== "" && Estpre.val() !== "") {

        InsertarPresentacion();
    } else {
        if (pre.val() !== "") {
            document.getElementById("iPresentacion").className = "form-control is-valid";
            document.getElementById("PreValid").style = "display:block;";
            document.getElementById("PreInValid").style = "display:none;";
        } else {
            document.getElementById("iPresentacion").className = "form-control is-invalid";
            document.getElementById("PreValid").style = "display:none;";
            document.getElementById("PreInValid").style = "display:block;";
        }
        if (Estpre.val() !== "") {
            document.getElementById("iEstadoPre").className = "form-control is-valid";
            document.getElementById("EsValid").style = "display:block;";
            document.getElementById("EsInValid").style = "display:none;";
        } else {
            document.getElementById("iEstadoPre").className = "form-control is-invalid";
            document.getElementById("EsValid").style = "display:none;";
            document.getElementById("EsInValid").style = "display:block;";
        }

    }

}
function ValidarFormModificacion() {
    var pre = $("#iPresentacionMod");
    var Estpre = $("#iEstadoPreMod");

    if (pre.val() !== "" && Estpre.val() !== "") {
        ModificarPre();
    } else {
        if (pre.val() !== "") {
            document.getElementById("iPresentacionMod").className = "form-control is-valid";
            document.getElementById("PreValidMod").style = "display:block;";
            document.getElementById("PreInValidMod").style = "display:none;";
        } else {
            document.getElementById("iPresentacionMod").className = "form-control is-invalid";
            document.getElementById("PreValidMod").style = "display:none;";
            document.getElementById("PreInValidMod").style = "display:block;";
        }
        if (Estpre.val() !== "") {
            document.getElementById("iEstadoPreMod").className = "form-control is-valid";
            document.getElementById("PreEsValidMod").style = "display:block;";
            document.getElementById("PreEsInValidMod").style = "display:none;";
        } else {
            document.getElementById("iEstadoPreMod").className = "form-control is-invalid";
            document.getElementById("PreEsValidMod").style = "display:none;";
            document.getElementById("PreEsInValidMod").style = "display:block;";
        }

    }

}
function DesactivarPresentacion(idp, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: {opc:"DesactivarPresentacion",idPre:idp,id_UM:idu},
        success: function (response)
        {
            location.href = "CRUD_Presentacion.php";
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
function ActivarPresentacion(idp, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: {opc:"ActivarPresentacion",idPre:idp,id_UM:idu},
        success: function (response)
        {
            location.href = "CRUD_Presentacion.php";
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