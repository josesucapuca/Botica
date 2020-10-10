/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    ListarCategoria();
    ListarLocal();
    ListarPresentacion();
    ListarProveedor();
});
function ListarCategoria() {
    
    $.ajax({
        type: "POST",
        url: '../Controlador/Categoria.php',
        data: {opcCat: "ListarCategoria"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia cat");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    html += '<option value="' + jsonData[i].id_Categoria + '">' + jsonData[i].No_Categoria + '</option>'
                }
                $("#Categoria").append(html);
                $("#CategoriaMod").append(html);
            }
        }
    });
}
function ListarPresentacion() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Presentacion.php',
        data: {opcPresentacion: "ListarPresentacion"},
        success: function (response)
        {

            if (response === null || response === "") {
                alert("La lista esta vacia pre");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    html += '<option value="' + jsonData[i].id_Presentacion + '">' + jsonData[i].No_Presentacion + '</option>'
                }
                $("#Presentacion").append(html);
                $("#PresentacionMod").append(html);
            }

        }
    });
}
function ListarLocal() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Local.php',
        data: {opc: "ListarLocal"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia loc");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    html += '<option value="' + jsonData[i].id_Local + '">' + jsonData[i].No_Local + '</option>'
                }
                $("#Local").append(html);
                $("#LocalMod").append(html);
            }
        }
    });
}
function ListarProveedor() {
    $.ajax({
        type: "POST",
        url: '../Controlador/Proveedor.php',
        data: {opc: "ListarProveedor"},
        success: function (response)
        {
            if (response === null || response === "") {
                alert("La lista esta vacia pro");
                location.href = "CRUD_Producto.php";
            } else {
                var jsonData = JSON.parse(response);
                var html = "";
                for (var i = 0; i < jsonData.length; i++) {
                    html += '<option value="' + jsonData[i].id_Proveedor + '">' + jsonData[i].No_Proveedor + '</option>'
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
        data: $("#FormIngresarProd").serialize(),
        success: function (response)
        {
            if (response === "true") {
                location.href = "CRUD_Producto.php";
            } else {

            }
        }
    });
}