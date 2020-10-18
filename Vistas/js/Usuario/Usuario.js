$("#btn_Enviar").click(function () {

    ValidarFormIngrsar();
});
$("#btn_Enviar_Mod").click(function () {
    ValidarFormModificacion();

});
$('#iCategoriaMod').keypress(function (e) {
    if (e.which === 13) {
        ModificarCat();
    }
});
$('#iCategoria').keypress(function (e) {
    if (e.which === 13) {
        ModificarCat();
    }
});
function InsertarCategoria() {

    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: $("#FormIngresarCat").serialize(),
        success: function (response)
        {
            if (response) {
                alert("Fue Ingresado exitosamente");
                location.href = "CRUD_Categorias.php";
            } else {
                alert("Problemas con la session vuelva a ingresar");
                location.href = "CRUD_Categorias.php";
            }
        }
    });
}
function ModificarLlenarCat(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: {opcCat: "ListarCategoriabyid", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Categorias.php";
            } else {
                var jsonData = JSON.parse(response);
                for (var i = 0; i < jsonData.length; i++) {
                    $("#iCategoriaMod").val(jsonData[i].No_Categoria);
                    $("#id_Cate").val(jsonData[i].id_Categoria);
                    if (jsonData[i].Es_Categoria === "1") {
                        $("#iEstadoCatMod option[value='1']").attr("selected", true);
                    } else {
                        $("#iEstadoCatMod option[value='0']").attr("selected", true);
                    }
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}
function ListarEmpleados(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: {opc: "ListarEmpleado", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Usuario_Empresa.php";
            } else {
                var jsonData = JSON.parse(response);
                $("#ListEmpleados").empty();
                var html = "";

                for (var i = 0; i < jsonData.length; i++) {
                    html += "<tr>";
                    html += "<td>" + (i + 1) + "</td>";
                    html += "<td>" + jsonData[i].No_Empleado + " " + jsonData[i].Ape_Empleado + "</td>";
                    if (jsonData[i].Usuario == null) {
                        html += '<td><button onclick="SeleccionarEmpleado(' + jsonData[i].id_Empleado + ')"  class="btn btn-icon btn-pill btn-warning" data-toggle="modal" data-target="#ModalInformacionEmpleado" style="color: white">Seleccionar</button></td>';
                    } else {
                        html += '<td>Tiene Usuario</td>';
                    }
                    html += "</tr>";
                }
                alert(html);
                $("#ListEmpleados").append(html);
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}
function ModificarCat() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: $('#FormModificarCat').serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "CRUD_Categorias.php";
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

    var cat = $("#iCategoria");
    var Estcat = $("#iEstadoCat");

    if (cat.val() !== "" && Estcat.val() !== "") {

        InsertarCategoria();
    } else {
        if (cat.val() !== "") {
            document.getElementById("iCategoria").className = "form-control is-valid";
            document.getElementById("CatValid").style = "display:block;";
            document.getElementById("CatInValid").style = "display:none;";
        } else {
            document.getElementById("iCategoria").className = "form-control is-invalid";
            document.getElementById("CatValid").style = "display:none;";
            document.getElementById("CatInValid").style = "display:block;";
        }
        if (Estcat.val() !== "") {
            document.getElementById("iEstadoCat").className = "form-control is-valid";
            document.getElementById("EsValid").style = "display:block;";
            document.getElementById("EsInValid").style = "display:none;";
        } else {
            document.getElementById("iEstadoCat").className = "form-control is-invalid";
            document.getElementById("EsValid").style = "display:none;";
            document.getElementById("EsInValid").style = "display:block;";
        }

    }

}
function ValidarFormModificacion() {
    var cat = $("#iCategoriaMod");
    var Estcat = $("#iEstadoCatMod");

    if (cat.val() !== "" && Estcat.val() !== "") {
        ModificarCat();
    } else {
        if (cat.val() !== "") {
            document.getElementById("iCategoriaMod").className = "form-control is-valid";
            document.getElementById("CatValidMod").style = "display:block;";
            document.getElementById("CatInValidMode").style = "display:none;";
        } else {
            document.getElementById("iCategoriaMod").className = "form-control is-invalid";
            document.getElementById("CatValidMod").style = "display:none;";
            document.getElementById("CatInValidMode").style = "display:block;";
        }
        if (Estcat.val() !== "") {
            document.getElementById("iEstadoCatMod").className = "form-control is-valid";
            document.getElementById("CatEsValid").style = "display:block;";
            document.getElementById("CatEsInValid").style = "display:none;";
        } else {
            document.getElementById("iEstadoCatMod").className = "form-control is-invalid";
            document.getElementById("CatEsValid").style = "display:none;";
            document.getElementById("CatEsInValid").style = "display:block;";
        }

    }

}
function DesactivarCategoria(idc, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: {opcCat: "DesactivarCategoria", idCat: idc, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Categorias.php";
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
function ActivarCategoria(idc, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: {opcCat: "ActivarCategoria", idCat: idc, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Categorias.php";
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