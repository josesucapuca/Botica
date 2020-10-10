$(document).ready(function () {
    function InsertarCategoria() {
        $.ajax({
            type: "POST",
            url: '../Controlador/Categoria.php',
            data: $("#FormIngresarCat").serialize(),
            success: function (response)
            {
                if (response) {
                    location.href = "CRUD_Categorias.php";
                } else {
                }
                //var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                /* if (jsonData[0] == "1")
                 {
                 alert();
                 // ListarProducto();
                 //location.href = 'my_profile.php';
                 }*/

            }
        });
    }
    $("#btn_Enviar").click(function () {
        ValidarFormLogueo();

    });
    $("#btn_Enviar_Mod").click(function () {
        ValidarFormLogueo();

    });
    $('#iCategoriaMod').keypress(function (e) {
        if (e.which === 13) {
            ModificarCat();
        }
    });
    function ValidarFormLogueo() {
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
    function ValidarFormLogueo() {
        var cat = $("#iCategoriaMod");
        var Estcat = $("#iEstadoCatMod");

        if (cat.val() !== "" && Estcat.val() !== "") {
            ModificarCat()();
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

});
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
                var json1 = [jsonData];
                for (var i = 0; i < json1.length; i++) {
                    $("#iCategoriaMod").val(json1[i].No_Categoria);
                    $("#id_Cate").val(json1[i].id_Categoria);
                    if (json1[i].Es_Categoria === "1") {
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
function ModificarCat() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: $('#FormModificarCat').serialize(),
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