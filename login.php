

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Control de Asistencia</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
        <link href="Jcss.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="text-center">

        <div style="width: 100%; position: fixed;top: 0;" id="container-alert">
        </div>
        <img src="imagenes/cm2.png" style="width: 150px; height: 100px; position: fixed; top: 8px;">
        <div class="form-control" style="background-color: transparent;border: 1px solid transparent;">   
            <br>
            <div style="margin:0px auto; background-color: #474747; height: 400px; border-radius: 10px;-webkit-box-shadow: 0px 0px 39px -9px rgba(38,38,38,1);
                 -moz-box-shadow: 0px 0px 39px -9px rgba(38,38,38,1);
                 box-shadow: 0px 0px 39px -9px rgba(38,38,38,1);" class="col-md-4">
                <form enctype="multipart/form-data" class="form-signin" method="POST" id="form-login">
                    <img class="mb-4" src="imagenes/logo.png" alt="" width="170" height="75">
                    <h1 class="h3 mb-3 font-weight-normal" style="color: #fff; font-size: 22px;">Control de asistencia</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" id="user" class="form-control" placeholder="Usuario" required>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="pass" class="form-control" placeholder="Password" required>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> <label style="color: #fff;">Mantener sesión iniciada</label>
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #546ab1;color: #fff;border: 1px solid #435896;">Iniciar Sesion</button>
                </form>
            </div>
        </div>
        <div style="position: fixed; bottom: 90px;">
            <img src="imagenes/images-build.png" class="button-float" onclick="showProveedores();">
            <div id="show-proveedor">
                <img src="imagenes/golden.png" class="button-float-slide" style="bottom: 100px;border: 2px solid #e3bb12;">
                <img src="imagenes/lenacarbon.png" class="button-float-slide" style="bottom: 160px;border: 2px solid #d00e17;">
                <img src="imagenes/retablo.png" class="button-float-slide" style="bottom: 220px;border: 2px solid #b67028;">
                <img src="imagenes/tinajas.png" class="button-float-slide" style="bottom: 280px;border: 2px solid #a94937;">
                <img src="imagenes/cviche.png" class="button-float-slide" style="bottom: 340px;border: 2px solid #bbc42f;">
                <img src="imagenes/lenasazon.png" class="button-float-slide" style="bottom: 400px;border: 2px solid #cb0309;">
            </div>
        </div>

        <script>
            function showProveedores() {
                var x = document.getElementById("show-proveedor");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
        <script>
            function cerrar_alert() {
                document.getElementById("container-alert").innerHTML = "";
            }
        </script>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>

            $(function () {
                $("#form-login").on("submit", function (e) {

                    var user = document.getElementById("user").value;
                    var pass = document.getElementById("pass").value;
                    e.preventDefault();
                    var f = $(this);
                    var formData = new FormData(document.getElementById("form-login"));
                    formData.append("user", user);
                    formData.append("pass", pass);
                    //formData.append(f.attr("name"), $(this)[0].files[0]);
                    $.ajax({
                        url: "./ws/ws-login.php",
                        type: "POST",
                        dataType: "json",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (res) {
                            //alert(res);
                            var newmsg = "";
                            if (res['status'] == 'Error') {
                                newmsg = '<div id="mensaje" style="background-color: #db3d3d;color: #fff;padding: 10px;width: 280px;font-size: 13px;"><span onclick="cerrar_alert();" aria-hidden="true" style="margin-right: 10px;cursor: pointer;font-size: 20px;">&times;</span> ' + res['msg'] + '</div>';
                                $("#container-alert").html(newmsg);
                            } else {
                                window.location.href = "./index.php";
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>