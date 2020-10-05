
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/datatables.min.css">
        <link rel="stylesheet" href="css/fullcalendar.min.css">
        <link rel="stylesheet" href="css/bootadmin.min.css">

        <title>Login | BootAdmin</title>
    </head>
    <body class="bg-light">

        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-4">
                    <h1 class="text-center mb-4">Logueo</h1>
                    <div class="card">
                        <div class="card-body">
                            <form name="formLogueo" action="Logueo.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="usuario" type="text" name="" class="form-control" placeholder="Username">
                                    <div id="usu_vacio" class="invalid-feedback" style="display: none">
                                        Ingresar Usuario
                                    </div>
                                    <div id="usu_invalido" class="invalid-feedback" style="display: none">
                                        Ingresar Usuario valido
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password" name="" class="form-control" placeholder="Password">
                                    <div id="pass_vacio" class="invalid-feedback" style="display: none">
                                        Ingresar contraseña
                                    </div>
                                    <div id="pass_invalido" class="invalid-feedback" style="display: none">
                                        Ingresar contraseña valida
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input">
                                        Recuerdame
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col pr-2">
                                        <button id="btn_Enviar" type="button" class="btn btn-block btn-primary">Ingresar</button>
                                    </div>
                                    <div class="col pl-2">
                                        <a class="btn btn-block btn-link" href="#">¿Sete olvido la contraseña?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/datatables.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/fullcalendar.min.js"></script>
        <script src="js/bootadmin.min.js"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118868344-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-118868344-1');
        </script>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-4097235499795154",
                enable_page_level_ads: true
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var usuario;
                var password;
                $("#btn_Enviar").click(function () {
                    usuario = $("#usuario").val();
                    password = $("#password").val();
                    if (usuario !== "" && password !== "") {
                        document.formLogueo.submit();
                    } else {
                        if (usuario === "") {
                            document.getElementById('usuario').className = "form-control is-invalid";
                            document.getElementById('usu_vacio').style = "display:block";
                        }else{
                            document.getElementById('usuario').className = "form-control is-valid";
                            document.getElementById('usu_vacio').style = "display:none";
                        }
                        if (password === "") {
                            document.getElementById('password').className = "form-control is-invalid";
                            document.getElementById('pass_vacio').style = "display:block";
                        }else{
                            document.getElementById('password').className = "form-control is-valid";
                            document.getElementById('pass_vacio').style = "display:none";
                        }
                    }
                });
            });
        </script>
    </body>
</html>