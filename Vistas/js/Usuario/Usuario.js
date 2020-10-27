
$("#btn_Enviar").click(function () {

    ValidarFormIngresar();
});
$("#closemo").click(function () {
    Limpiar()();
});
$("#btn_Enviar_Mod").click(function () {
    ValidarFormModificacion();
});
function Limpiar() {
    $("#id_Empleado").val("");
    $("#Empleado").val("");
    $("#Usuario").val("");
    $("#password").val("");
    $("#Conpassword").val("");
    $("#correo").val("");
    $("#Estado").val("");
    $("#Nivel").val("");
    $("#Estado option[value='']").attr("selected", true);
    $("#Nivel option[value='']").attr("selected", true);
    document.getElementById('FormIngresarUsuario').style = "display:none"
}
function InsertarUsuario() {

    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: $("#FormIngresarUsuario").serialize(),
        success: function (response)
        {
            if (response) {
                alert("Fue Ingresado exitosamente");
                location.href = "CRUD_Usuario_Empresa.php";
            } else {
                alert("Problemas con la session vuelva a ingresar");
                location.href = "CRUD_Usuario_Empresa.php";
            }
        }
    });
}
function ModificarLlenarUsu(id) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: {opc: "ListarUsuarioById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Usuario_Empresa.php";
            } else {
                var jsonData = JSON.parse(response);
                for (var i = 0; i < jsonData.length; i++) {
                    $("#EmpleadoMod").val(jsonData[i].Empleado);
                    $("#UsuarioMod").val(jsonData[i].Usuario);
                    $("#id_Usuario").val(jsonData[i].id_Usuario);
                    $("#passwordMod").val(jsonData[i].Password);
                    $("#ConpasswordMod").val(jsonData[i].Password);
                    $("#correoMod").val(jsonData[i].Correo_Usuario);
                    $("#EstadoMod option[value='" + jsonData[i].Es_Usuario + "']").attr("selected", true);
                    $("#NivelMod option[value='" + jsonData[i].Nivel_Usuario + "']").attr("selected", true);
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
                        html += '<td><button onclick="SeleccionarEmpleado(' + jsonData[i].id_Empleado + ')"  class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalInformacionEmpleado" style="color: white">Crear Usuario</button></td>';
                    } else {
                        html += '<td>Tiene Usuario</td>';
                    }
                    html += "</tr>";
                }
                $("#ListEmpleados").append(html);
            }

        }
    });
}
function ModificarUsuario() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: $('#FormModificacionUsuario').serialize(),
        success: function (response)
        {
            if (response) {
                location.href = "CRUD_Usuario_Empresa.php";
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
function UsuarioCorrecto() {
    document.getElementById('Usuario').className = 'form-control is-valid';
    document.getElementById('usuiValid').style = 'display:block';
    document.getElementById('usuiInValid').style = 'display:none';
}
function UsuarioIncorrecto() {
    document.getElementById('Usuario').className = 'form-control is-invalid';
    document.getElementById('usuiValid').style = 'display:none';
    document.getElementById('usuiInValid').style = 'display:block';
}
function EstadoCorrecto() {
    document.getElementById('Estado').className = 'form-control is-valid';
    document.getElementById('EsiEsValid').style = 'display:block';
    document.getElementById('EsiEsInValid').style = 'display:none';
}
function EstadoIncorrecto() {
    document.getElementById('Estado').className = 'form-control is-invalid';
    document.getElementById('EsiEsValid').style = 'display:none';
    document.getElementById('EsiEsInValid').style = 'display:block';
}
function NivelCorrecto() {
    document.getElementById('Nivel').className = 'form-control is-valid';
    document.getElementById('NiiEsValid').style = 'display:block';
    document.getElementById('NiiEsInValid').style = 'display:none';
}
function NivelIncorrecto() {
    document.getElementById('Nivel').className = 'form-control is-invalid';
    document.getElementById('NiiEsValid').style = 'display:none';
    document.getElementById('NiiEsInValid').style = 'display:block';
}
function PasswordCorrecto() {
    document.getElementById('password').className = 'form-control is-valid';
    document.getElementById('PassiValid').style = 'display:block';
    document.getElementById('PassiInValid').style = 'display:none';
    document.getElementById('PassiNoInValid').style = 'display:none';
}
function PasswordIncorrecto() {
    document.getElementById('password').className = 'form-control is-invalid';
    document.getElementById('PassiValid').style = 'display:none';
    document.getElementById('PassiInValid').style = 'display:block';
    document.getElementById('PassiNoInValid').style = 'display:none';
}
function Passwordnocoinciden() {
    document.getElementById('password').className = 'form-control is-invalid';
    document.getElementById('PassiValid').style = 'display:none';
    document.getElementById('PassiInValid').style = 'display:none';
    document.getElementById('PassiNoInValid').style = 'display:block';
}
function ConPasswordCorrecto() {
    document.getElementById('Conpassword').className = 'form-control is-valid';
    document.getElementById('passciValid').style = 'display:block';
    document.getElementById('passciInValid').style = 'display:none';
    document.getElementById('passciNoInValid').style = 'display:none';
}
function ConPasswordIncorrecto() {
    document.getElementById('Conpassword').className = 'form-control is-invalid';
    document.getElementById('passciValid').style = 'display:none';
    document.getElementById('passciInValid').style = 'display:block';
    document.getElementById('passciNoInValid').style = 'display:none';
}
function ConPasswordnocoinciden() {
    document.getElementById('Conpassword').className = 'form-control is-invalid';
    document.getElementById('passciValid').style = 'display:none';
    document.getElementById('passciInValid').style = 'display:none';
    document.getElementById('passciNoInValid').style = 'display:block';
}
function CorreoCorrecto() {
    document.getElementById('correo').className = 'form-control is-valid';
    document.getElementById('CoInValid').style = 'display:none';
}
function CorreoIncorrecto() {
    document.getElementById('correo').className = 'form-control is-invalid';
    document.getElementById('CoInValid').style = 'display:block';
}
function ValidarFormIngresar() {
    var Usuario = $("#Usuario");
    var password = $("#password");
    var Conpassword = $("#Conpassword");
    var correo = $("#correo");
    var Estado = $("#Estado");
    var Nivel = $("#Nivel");
    if (Usuario.val() !== "" &&
            password.val() !== "" &&
            Conpassword.val() !== "" &&
            Estado.val() !== "" &&
            Nivel.val() !== "") {
        UsuarioCorrecto();
        EstadoCorrecto();
        NivelCorrecto();
        if ($('#password').val().length > 7 && $("#password").val().match(/[A-Z]/)
                && $("#password").val().match(/\d/)) {
            $('#pasv').css("display", "none");
            if (password.val() === Conpassword.val()) {
                PasswordCorrecto();
                ConPasswordCorrecto();
                if (correo.val() === "") {
                    document.getElementById('correo').className = 'form-control';
                    document.getElementById('CoInValid').style = 'display:none';
                    InsertarUsuario();
                } else {
                    if (validarEmail(correo.val())) {
                        CorreoCorrecto();
                        InsertarUsuario();
                    } else {
                        CorreoIncorrecto();
                    }
                }
            } else {

                Passwordnocoinciden();
                ConPasswordnocoinciden();
                if (correo.val() === "") {
                    document.getElementById('correo').className = 'form-control';
                    document.getElementById('CoInValid').style = 'display:none';
                } else {
                    if (validarEmail(correo.val())) {
                        CorreoCorrecto();
                    } else {
                        CorreoIncorrecto();
                    }
                }
            }
        } else {
            $('#password').addClass("is-invalid");
            $('#password').removeClass("is-valid");
            $('#pasv').css("display", "block");
            $('#PassiInValid').css("display", "none");
            $('#PassiNoInValid').css("display", "none");
        }
    } else {
        if (Usuario.val() !== "") {
            UsuarioCorrecto();
        } else {
            UsuarioIncorrecto();
        }
        if (Estado.val() !== "") {
            EstadoCorrecto();
        } else {
            EstadoIncorrecto();
        }
        if (Nivel.val() !== "") {
            NivelCorrecto();
        } else {
            NivelIncorrecto();
        }
        if (password.val() !== "" && Conpassword.val() !== "") {
            if ($('#password').val().length > 8 && $("#password").val().match(/[A-Z]/)
                    && $("#password").val().match(/\d/)) {
                $('#pasv').css("display", "none");
                if (password.val() === Conpassword.val()) {
                    PasswordCorrecto();
                    ConPasswordCorrecto();
                } else {
                    Passwordnocoinciden();
                    ConPasswordnocoinciden();
                }
            } else {
                $('#password').addClass("is-invalid");
                $('#password').removeClass("is-valid");
                $('#pasv').css("display", "block");
                $('#PassiInValid').css("display", "none");
                $('#PassiNoInValid').css("display", "none");
            }

        } else {
            if (password.val() !== "") {
                if ($('#password').val().length > 8 && $("#password").val().match(/[A-Z]/)
                        && $("#password").val().match(/\d/))
                {
                    PasswordCorrecto();
                    $('#pasv').css("display", "none");
                } else {
                    $('#password').addClass("is-invalid");
                    $('#password').removeClass("is-valid");
                    $('#pasv').css("display", "block");
                    $('#PassiInValid').css("display", "none");
                    $('#PassiNoInValid').css("display", "none");
                }
            } else {
                PasswordIncorrecto();
            }
            if (Conpassword.val() !== "") {
                ConPasswordCorrecto();
            } else {
                ConPasswordIncorrecto();
            }
        }
        if (correo.val() !== "") {
            if (validarEmail(correo.val())) {
                CorreoCorrecto();
            } else {
                CorreoIncorrecto();
            }
        } else {
            document.getElementById('correo').className = 'form-control';
        }
    }
}
function validarEmail(valor) {
    if (valor.indexOf('@', 0) == -1 || valor.indexOf('.', 0) == -1) {
        return false;
    } else {
        return true;
    }
}
function ValidarFormModificacion() {
    var Usuario = $("#UsuarioMod");
    var password = $("#passwordMod");
    var Conpassword = $("#ConpasswordMod");
    var correo = $("#correoMod");
    var Estado = $("#EstadoMod");
    var Nivel = $("#NivelMod");
    if (Usuario.val() !== "" && password.val() !== ""
            && Conpassword.val() !== ""
            && Estado.val() !== ""
            && Nivel.val() !== "")
    {
        if (correo.val() === "") {
            document.getElementById("correoMod").className = "form-control ";
            document.getElementById("CoInValidMod").style = "display:none;";
            if (password.val() !== "" && Conpassword.val() !== "") {
                if (password.val() === Conpassword.val()) {
                    ModificarUsuario();
                } else {
                    if (Usuario.val() !== "") {
                        document.getElementById("UsuarioMod").className = "form-control is-valid";
                        document.getElementById("UsuValidMod").style = "display:block;";
                        document.getElementById("UsuInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("UsuarioMod").className = "form-control is-invalid";
                        document.getElementById("UsuValidMod").style = "display:none;";
                        document.getElementById("UsuInValidMod").style = "display:block;";
                    }
                    if (Estado.val() !== "") {
                        document.getElementById("EstadoMod").className = "form-control is-valid";
                        document.getElementById("EsValidMod").style = "display:block;";
                        document.getElementById("EsInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("EstadoMod").className = "form-control is-invalid";
                        document.getElementById("EsValidMod").style = "display:none;";
                        document.getElementById("EsInValidMod").style = "display:block;";
                    }
                    if (Nivel.val() !== "") {
                        document.getElementById("NivelMod").className = "form-control is-valid";
                        document.getElementById("NiValidMod").style = "display:block;";
                        document.getElementById("NiInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("NivelMod").className = "form-control is-invalid";
                        document.getElementById("NiValidMod").style = "display:none;";
                        document.getElementById("NiInValidMod").style = "display:block;";
                    }
                    document.getElementById("passwordMod").className = "form-control is-invalid";
                    document.getElementById("PassValidMod").style = "display:none;";
                    document.getElementById("PassInValidMod").style = "display:none;";
                    document.getElementById("PassNoInValidMod").style = "display:block;";
                    document.getElementById("ConpasswordMod").className = "form-control is-invalid";
                    document.getElementById("PassConValidMod").style = "display:none;";
                    document.getElementById("PassConInValidMod").style = "display:none;";
                    document.getElementById("PassConNoInValidMod").style = "display:block;";
                }
            } else {
                if (Usuario.val() !== "") {
                    document.getElementById("UsuarioMod").className = "form-control is-valid";
                    document.getElementById("UsuValidMod").style = "display:block;";
                    document.getElementById("UsuInValidMod").style = "display:none;";
                } else {
                    document.getElementById("UsuarioMod").className = "form-control is-invalid";
                    document.getElementById("UsuValidMod").style = "display:none;";
                    document.getElementById("UsuInValidMod").style = "display:block;";
                }
                if (Estado.val() !== "") {
                    document.getElementById("EstadoMod").className = "form-control is-valid";
                    document.getElementById("EsValidMod").style = "display:block;";
                    document.getElementById("EsInValidMod").style = "display:none;";
                } else {
                    document.getElementById("EstadoMod").className = "form-control is-invalid";
                    document.getElementById("EsValidMod").style = "display:none;";
                    document.getElementById("EsInValidMod").style = "display:block;";
                }
                if (Nivel.val() !== "") {
                    document.getElementById("NivelMod").className = "form-control is-valid";
                    document.getElementById("NiValidMod").style = "display:block;";
                    document.getElementById("NiInValidMod").style = "display:none;";
                } else {
                    document.getElementById("NivelMod").className = "form-control is-invalid";
                    document.getElementById("NiValidMod").style = "display:none;";
                    document.getElementById("NiInValidMod").style = "display:block;";
                }
                if (password.val() !== "") {
                    document.getElementById("passwordMod").className = "form-control is-valid";
                    document.getElementById("PassValidMod").style = "display:block;";
                    document.getElementById("PassInValidMod").style = "display:none;";
                } else {
                    document.getElementById("passwordMod").className = "form-control is-invalid";
                    document.getElementById("PassValidMod").style = "display:none;";
                    document.getElementById("PassInValidMod").style = "display:block;";
                }
                if (Conpassword.val() !== "") {
                    document.getElementById("ConpasswordMod").className = "form-control is-valid";
                    document.getElementById("PassConValidMod").style = "display:block;";
                    document.getElementById("PassConInValidMod").style = "display:none;";
                    document.getElementById("PassConNoInValidMod").style = "display:none;";
                } else {
                    document.getElementById("ConpasswordMod").className = "form-control is-invalid";
                    document.getElementById("PassConValidMod").style = "display:none;";
                    document.getElementById("PassConInValidMod").style = "display:block;";
                    document.getElementById("PassConNoInValidMod").style = "display:none;";
                }
            }
        } else {
            var co = validarEmail(correo.val());
            if (co) {

                if (password.val() !== "" && Conpassword.val() !== "") {
                    if (Usuario.val() !== "") {
                        document.getElementById("UsuarioMod").className = "form-control is-valid";
                        document.getElementById("UsuValidMod").style = "display:block;";
                        document.getElementById("UsuInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("UsuarioMod").className = "form-control is-invalid";
                        document.getElementById("UsuValidMod").style = "display:none;";
                        document.getElementById("UsuInValidMod").style = "display:block;";
                    }
                    if (Estado.val() !== "") {
                        document.getElementById("EstadoMod").className = "form-control is-valid";
                        document.getElementById("EsValidMod").style = "display:block;";
                        document.getElementById("EsInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("EstadoMod").className = "form-control is-invalid";
                        document.getElementById("EsValidMod").style = "display:none;";
                        document.getElementById("EsInValidMod").style = "display:block;";
                    }
                    if (Nivel.val() !== "") {
                        document.getElementById("NivelMod").className = "form-control is-valid";
                        document.getElementById("NiValidMod").style = "display:block;";
                        document.getElementById("NiInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("NivelMod").className = "form-control is-invalid";
                        document.getElementById("NiValidMod").style = "display:none;";
                        document.getElementById("NiInValidMod").style = "display:block;";
                    }
                    if (password.val() === Conpassword.val()) {
                        ModificarUsuario();
                    } else {
                        if (Usuario.val() !== "") {
                            document.getElementById("UsuarioMod").className = "form-control is-valid";
                            document.getElementById("UsuValidMod").style = "display:block;";
                            document.getElementById("UsuInValidMod").style = "display:none;";
                        } else {
                            document.getElementById("UsuarioMod").className = "form-control is-invalid";
                            document.getElementById("UsuValidMod").style = "display:none;";
                            document.getElementById("UsuInValidMod").style = "display:block;";
                        }
                        if (Estado.val() !== "") {
                            document.getElementById("EstadoMod").className = "form-control is-valid";
                            document.getElementById("EsValidMod").style = "display:block;";
                            document.getElementById("EsInValidMod").style = "display:none;";
                        } else {
                            document.getElementById("EstadoMod").className = "form-control is-invalid";
                            document.getElementById("EsValidMod").style = "display:none;";
                            document.getElementById("EsInValidMod").style = "display:block;";
                        }
                        if (Nivel.val() !== "") {
                            document.getElementById("NivelMod").className = "form-control is-valid";
                            document.getElementById("NiValidMod").style = "display:block;";
                            document.getElementById("NiInValidMod").style = "display:none;";
                        } else {
                            document.getElementById("NivelMod").className = "form-control is-invalid";
                            document.getElementById("NiValidMod").style = "display:none;";
                            document.getElementById("NiInValidMod").style = "display:block;";
                        }
                        document.getElementById("passwordMod").className = "form-control is-valid";
                        document.getElementById("PassValidMod").style = "display:none;";
                        document.getElementById("PassInValidMod").style = "display:none;";
                        document.getElementById("PassNoInValidMod").style = "display:block;";
                        document.getElementById("ConpasswordMod").className = "form-control is-valid";
                        document.getElementById("PassConValidMod").style = "display:none;";
                        document.getElementById("PassConInValidMod").style = "display:none;";
                        document.getElementById("PassConNoInValidMod").style = "display:block;";
                    }
                } else {
                    if (Usuario.val() !== "") {
                        document.getElementById("UsuarioMod").className = "form-control is-valid";
                        document.getElementById("UsuValidMod").style = "display:block;";
                        document.getElementById("UsuInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("UsuarioMod").className = "form-control is-invalid";
                        document.getElementById("UsuValidMod").style = "display:none;";
                        document.getElementById("UsuInValidMod").style = "display:block;";
                    }
                    if (Estado.val() !== "") {
                        document.getElementById("EstadoMod").className = "form-control is-valid";
                        document.getElementById("EsValidMod").style = "display:block;";
                        document.getElementById("EsInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("EstadoMod").className = "form-control is-invalid";
                        document.getElementById("EsValidMod").style = "display:none;";
                        document.getElementById("EsInValidMod").style = "display:block;";
                    }
                    if (Nivel.val() !== "") {
                        document.getElementById("NivelMod").className = "form-control is-valid";
                        document.getElementById("NiValidMod").style = "display:block;";
                        document.getElementById("NiInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("NivelMod").className = "form-control is-invalid";
                        document.getElementById("NiValidMod").style = "display:none;";
                        document.getElementById("NiInValidMod").style = "display:block;";
                    }
                    if (password.val() !== "") {
                        document.getElementById("passwordMod").className = "form-control is-valid";
                        document.getElementById("PassValidMod").style = "display:block;";
                        document.getElementById("PassInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("passwordMod").className = "form-control is-invalid";
                        document.getElementById("PassValidMod").style = "display:none;";
                        document.getElementById("PassInValidMod").style = "display:block;";
                    }
                    if (Conpassword.val() !== "") {
                        document.getElementById("ConpasswordMod").className = "form-control is-valid";
                        document.getElementById("PassConValidMod").style = "display:block;";
                        document.getElementById("PassConInValidMod").style = "display:none;";
                        document.getElementById("PassConNoInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("ConpasswordMod").className = "form-control is-invalid";
                        document.getElementById("PassConValidMod").style = "display:none;";
                        document.getElementById("PassConInValidMod").style = "display:block;";
                        document.getElementById("PassConNoInValidMod").style = "display:none;";
                    }
                }

            } else {
                if (Usuario.val() !== "") {
                    document.getElementById("UsuarioMod").className = "form-control is-valid";
                    document.getElementById("UsuValidMod").style = "display:block;";
                    document.getElementById("UsuInValidMod").style = "display:none;";
                } else {
                    document.getElementById("UsuarioMod").className = "form-control is-invalid";
                    document.getElementById("UsuValidMod").style = "display:none;";
                    document.getElementById("UsuInValidMod").style = "display:block;";
                }
                if (Estado.val() !== "") {
                    document.getElementById("EstadoMod").className = "form-control is-valid";
                    document.getElementById("EsValidMod").style = "display:block;";
                    document.getElementById("EsInValidMod").style = "display:none;";
                } else {
                    document.getElementById("EstadoMod").className = "form-control is-invalid";
                    document.getElementById("EsValidMod").style = "display:none;";
                    document.getElementById("EsInValidMod").style = "display:block;";
                }
                if (Nivel.val() !== "") {
                    document.getElementById("NivelMod").className = "form-control is-valid";
                    document.getElementById("NiValidMod").style = "display:block;";
                    document.getElementById("NiInValidMod").style = "display:none;";
                } else {
                    document.getElementById("NivelMod").className = "form-control is-invalid";
                    document.getElementById("NiValidMod").style = "display:none;";
                    document.getElementById("NiInValidMod").style = "display:block;";
                }
                if (password.val() !== "" && Conpassword.val() !== "") {
                    if (password.val() === Conpassword.val()) {
                        document.getElementById("passwordMod").className = "form-control is-valid";
                        document.getElementById("PassValidMod").style = "display:block;";
                        document.getElementById("PassInValidMod").style = "display:none;";
                        document.getElementById("PassNoInValidMod").style = "display:none;";
                        document.getElementById("ConpasswordMod").className = "form-control is-valid";
                        document.getElementById("PassConValidMod").style = "display:block;";
                        document.getElementById("PassConInValidMod").style = "display:none;";
                        document.getElementById("PassConNoInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("passwordMod").className = "form-control is-invalid";
                        document.getElementById("PassValidMod").style = "display:none;";
                        document.getElementById("PassInValidMod").style = "display:none;";
                        document.getElementById("PassNoInValidMod").style = "display:block;";
                        document.getElementById("ConpasswordMod").className = "form-control is-invalid";
                        document.getElementById("PassConValidMod").style = "display:none;";
                        document.getElementById("PassConInValidMod").style = "display:none;";
                        document.getElementById("PassConNoInValidMod").style = "display:block;";
                    }
                } else {
                    if (password.val() !== "") {
                        document.getElementById("passwordMod").className = "form-control is-valid";
                        document.getElementById("PassValidMod").style = "display:block;";
                        document.getElementById("PassInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("passwordMod").className = "form-control is-invalid";
                        document.getElementById("PassValidMod").style = "display:none;";
                        document.getElementById("PassInValidMod").style = "display:block;";
                    }
                    if (Conpassword.val() !== "") {
                        document.getElementById("ConpasswordMod").className = "form-control is-valid";
                        document.getElementById("PassConValidMod").style = "display:block;";
                        document.getElementById("PassConInValidMod").style = "display:none;";
                        document.getElementById("PassConNoInValidMod").style = "display:none;";
                    } else {
                        document.getElementById("ConpasswordMod").className = "form-control is-invalid";
                        document.getElementById("PassConValidMod").style = "display:none;";
                        document.getElementById("PassConInValidMod").style = "display:block;";
                        document.getElementById("PassConNoInValidMod").style = "display:none;";
                    }
                }
                document.getElementById("correoMod").className = "form-control is-invalid";
                document.getElementById("CoInValidMod").style = "display:block;";
            }
        }
    } else {
        if (Usuario.val() !== "") {
            document.getElementById("UsuarioMod").className = "form-control is-valid";
            document.getElementById("UsuValidMod").style = "display:block;";
            document.getElementById("UsuInValidMod").style = "display:none;";
        } else {
            document.getElementById("UsuarioMod").className = "form-control is-invalid";
            document.getElementById("UsuValidMod").style = "display:none;";
            document.getElementById("UsuInValidMod").style = "display:block;";
        }
        if (Estado.val() !== "") {
            document.getElementById("EstadoMod").className = "form-control is-valid";
            document.getElementById("EsValidMod").style = "display:block;";
            document.getElementById("EsInValidMod").style = "display:none;";
        } else {
            document.getElementById("EstadoMod").className = "form-control is-invalid";
            document.getElementById("EsValidMod").style = "display:none;";
            document.getElementById("EsInValidMod").style = "display:block;";
        }
        if (Nivel.val() !== "") {
            document.getElementById("NivelMod").className = "form-control is-valid";
            document.getElementById("NiValidMod").style = "display:block;";
            document.getElementById("NiInValidMod").style = "display:none;";
        } else {
            document.getElementById("NivelMod").className = "form-control is-invalid";
            document.getElementById("NiValidMod").style = "display:none;";
            document.getElementById("NiInValidMod").style = "display:block;";
        }

        if (password.val() !== "" && Conpassword.val() !== "") {
            if (password.val() === Conpassword.val()) {
                document.getElementById("passwordMod").className = "form-control is-valid";
                document.getElementById("PassValidMod").style = "display:block;";
                document.getElementById("PassInValidMod").style = "display:none;";
                document.getElementById("PassNoInValidMod").style = "display:none;";
                document.getElementById("ConpasswordMod").className = "form-control is-valid";
                document.getElementById("PassConValidMod").style = "display:block;";
                document.getElementById("PassConInValidMod").style = "display:none;";
                document.getElementById("PassConNoInValidMod").style = "display:none;";
            } else {
                document.getElementById("passwordMod").className = "form-control is-valid";
                document.getElementById("PassValidMod").style = "display:none;";
                document.getElementById("PassInValidMod").style = "display:none;";
                document.getElementById("PassNoInValidMod").style = "display:block;";
                document.getElementById("ConpasswordMod").className = "form-control is-valid";
                document.getElementById("PassConValidMod").style = "display:none;";
                document.getElementById("PassConInValidMod").style = "display:none;";
                document.getElementById("PassConNoInValidMod").style = "display:block;";
            }
        } else {
            if (password.val() !== "") {
                document.getElementById("passwordMod").className = "form-control is-valid";
                document.getElementById("PassValidMod").style = "display:block;";
                document.getElementById("PassInValidMod").style = "display:none;";
            } else {
                document.getElementById("passwordMod").className = "form-control is-invalid";
                document.getElementById("PassValidMod").style = "display:none;";
                document.getElementById("PassInValidMod").style = "display:block;";
            }
            if (Conpassword.val() !== "") {
                document.getElementById("ConpasswordMod").className = "form-control is-valid";
                document.getElementById("PassConValidMod").style = "display:block;";
                document.getElementById("PassConInValidMod").style = "display:none;";
                document.getElementById("PassConNoInValidMod").style = "display:none;";
            } else {
                document.getElementById("ConpasswordMod").className = "form-control is-invalid";
                document.getElementById("PassConValidMod").style = "display:none;";
                document.getElementById("PassConInValidMod").style = "display:block;";
                document.getElementById("PassConNoInValidMod").style = "display:none;";
            }
        }
        if (correo.val() === "") {
        } else {
            var co = validarEmail(correo.val());
            if (co) {
            } else {
                document.getElementById("correoMod").className = "form-control is-invalid";
                document.getElementById("CoInValidMod").style = "display:block;";
            }
        }

    }

}
function DesactivarUsuario(id, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: {opc: "DesactivarUsuario", id: id, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Usuario_Empresa.php";
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
function ActivarUsuario(id, idu) {
    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: {opc: "ActivarUsuario", id: id, id_UM: idu},
        success: function (response)
        {
            location.href = "CRUD_Usuario_Empresa.php";
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

function SeleccionarEmpleado(id) {
    $('#btn_Enviar').attr("disabled", false);
    $.ajax({
        type: "POST",
        url: '../Controlador/Empleado.php',
        data: {opc: "ListarEmpleadoById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Usuario_Empresa.php";
            } else {
                var jsonData = JSON.parse(response);
                document.getElementById('FormIngresarUsuario').style = "display:block;";
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    $("#Empleado").val(jsonData[i].No_Empleado + " " + jsonData[i].Ape_Empleado);
                    $("#id_Empleado").val(jsonData[i].id_Empleado);
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}

function InfoUsuario(id) {
    $('#btn_Enviar').attr("disabled", false);
    $.ajax({
        type: "POST",
        url: '../Controlador/Usuario.php',
        data: {opc: "ListarUsuarioById", id: id},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia");
                location.href = "CRUD_Usuario_Empresa.php";
            } else {
                var jsonData = JSON.parse(response);
                document.getElementById('FormIngresarUsuario').style = "display:block;";
                $("#NiUsuario").empty();
                $("#CorreoUsua").empty();
                $("#UsuarioCrea").empty();
                $("#UsuModi").empty();
                for (var i = 0; i < jsonData.length; i++) {
                    if (jsonData[i].Nivel_Usuario === "1") {
                        $("#NiUsuario").append("Administrador");
                    } else if (jsonData[i].Nivel_Usuario === "2") {
                        $("#NiUsuario").append("Vendedor");
                    }
                    if (jsonData[i].Correo_Usuario !== "") {
                        $("#CorreoUsua").append(jsonData[i].Correo_Usuario);
                    } else {
                        $("#CorreoUsua").append("No Registrado");
                    }
                    if (jsonData[i].Usaurio_Creacion !== "") {
                        $("#UsuarioCrea").append(jsonData[i].Usaurio_Creacion);
                    } else {
                        $("#UsuarioCrea").append("No Registrado");
                    }
                    if (jsonData[i].Usuario_Modificacion !== "") {
                        $("#UsuModi").append(jsonData[i].Usuario_Modificacion);
                    } else {
                        $("#UsuModi").append("No Registrado");
                    }
                    
                }
                //location.href = "CRUD_Categorias.php";
            }

        }
    });
}