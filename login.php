

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>ISC Control</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
        <link href="Jcss.css" rel="stylesheet" type="text/css"/>
        <style>
            /* CSS reset */
            body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td { 
                margin:0;
                padding:0;
            }
            html,body {
                margin:0;
                padding:0;
            }
            table {
                border-collapse:collapse;
                border-spacing:0;
            }
            fieldset,img { 
                border:0;
            }
            input{
                border:1px solid #b0b0b0;
                padding:3px 5px 4px;
                color:#979797;
                width:190px;
            }
            address,caption,cite,code,dfn,th,var {
                font-style:normal;
                font-weight:normal;
            }
            ol,ul {
                list-style:none;
            }
            caption,th {
                text-align:left;
            }
            h1,h2,h3,h4,h5,h6 {
                font-size:100%;
                font-weight:normal;
            }
            q:before,q:after {
                content:'';
            }
            abbr,acronym { border:0;
            }
            /* General Demo Style */
            body{
            font-family: "helvetica neue", helvetica;
                background: #000;
                font-weight: 400;
                font-size: 15px;
                color: #aa3e03;
                overflow-y: scroll;
                overflow-x: hidden;
            }
            .ie7 body{
                overflow:hidden;
            }
            a{
                color: #333;
                text-decoration: none;
            }
            .container{
                position: relative;
                text-align: center;
            }
            .clr{
                clear: both;
            }
            .container > header{
                padding: 30px 30px 10px 20px;
                margin: 0px 20px 10px 20px;
                position: relative;
                display: block;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
                text-align: left;
            }
            .container > header h1{
            font-family: "helvetica neue", helvetica;
                font-size: 35px;
                line-height: 35px;
                position: relative;
                font-weight: 400;
                color: #fff;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
                padding: 0px 0px 5px 0px;
            }
            .container > header h1 span{

            }
            .container > header h2, p.info{
                font-size: 16px;
                font-style: italic;
                color: #f8f8f8;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.6);
            }

            .slideshow,
            .slideshow:after {
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                z-index: 0;
            }
            .slideshow:after {
                content: '';
                background: transparent url(../images/pattern.png) repeat top left;
            }
            .slideshow li span {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0px;
                left: 0px;
                color: transparent;
                background-size: cover;
                background-position: 50% 50%;
                background-repeat: none;
                opacity: 0;
                z-index: 0;
                -webkit-backface-visibility: hidden;
                -webkit-animation: imageAnimation 36s linear infinite 0s;
                -moz-animation: imageAnimation 36s linear infinite 0s;
                -o-animation: imageAnimation 36s linear infinite 0s;
                -ms-animation: imageAnimation 36s linear infinite 0s;
                animation: imageAnimation 36s linear infinite 0s;
            }
            .slideshow li div {
                z-index: 1000;
                position: absolute;
                bottom: 30px;
                left: 0px;
                width: 100%;
                text-align: center;
                opacity: 0;
                -webkit-animation: titleAnimation 36s linear infinite 0s;
                -moz-animation: titleAnimation 36s linear infinite 0s;
                -o-animation: titleAnimation 36s linear infinite 0s;
                -ms-animation: titleAnimation 36s linear infinite 0s;
                animation: titleAnimation 36s linear infinite 0s;
            }
            .slideshow li div h3 {
            font-family: "helvetica neue", helvetica;
            text-transform: uppercase;
            font-size: 80px;
            padding: 0;
            line-height: 200px;
                color: rgba(255,255,255, 0.8);
            }
            .slideshow li:nth-child(1) span { background-image: url(imagenes/bg-goldenchicken.jpg) }
            .slideshow li:nth-child(2) span {
                background-image: url(imagenes/bg-lenaycarbon.jpg);
                -webkit-animation-delay: 6s;
                -moz-animation-delay: 6s;
                -o-animation-delay: 6s;
                -ms-animation-delay: 6s;
                animation-delay: 6s;
            }
            .slideshow li:nth-child(3) span {
                background-image: url('imagenes/bg-retablo.jpg');
                -webkit-animation-delay: 12s;
                -moz-animation-delay: 12s;
                -o-animation-delay: 12s;
                -ms-animation-delay: 12s;
                animation-delay: 12s;
            }
            .slideshow li:nth-child(4) span {
                background-image: url(imagenes/bg-tinajas.jpg);
                -webkit-animation-delay: 18s;
                -moz-animation-delay: 18s;
                -o-animation-delay: 18s;
                -ms-animation-delay: 18s;
                animation-delay: 18s;
            }
            .slideshow li:nth-child(5) span {
                background-image: url(imagenes/bg-cviche.jpg);
                -webkit-animation-delay: 24s;
                -moz-animation-delay: 24s;
                -o-animation-delay: 24s;
                -ms-animation-delay: 24s;
                animation-delay: 24s;
            }
            .slideshow li:nth-child(6) span {
                background-image: url(imagenes/bg-lenaysazon.jpg);
                -webkit-animation-delay: 30s;
                -moz-animation-delay: 30s;
                -o-animation-delay: 30s;
                -ms-animation-delay: 30s;
                animation-delay: 30s;
            }
            .slideshow li:nth-child(2) div {
                -webkit-animation-delay: 6s;
                -moz-animation-delay: 6s;
                -o-animation-delay: 6s;
                -ms-animation-delay: 6s;
                animation-delay: 6s;
            }
            .slideshow li:nth-child(3) div {
                -webkit-animation-delay: 12s;
                -moz-animation-delay: 12s;
                -o-animation-delay: 12s;
                -ms-animation-delay: 12s;
                animation-delay: 12s;
            }
            .slideshow li:nth-child(4) div {
                -webkit-animation-delay: 18s;
                -moz-animation-delay: 18s;
                -o-animation-delay: 18s;
                -ms-animation-delay: 18s;
                animation-delay: 18s;
            }
            .slideshow li:nth-child(5) div {
                -webkit-animation-delay: 24s;
                -moz-animation-delay: 24s;
                -o-animation-delay: 24s;
                -ms-animation-delay: 24s;
                animation-delay: 24s;
            }
            .slideshow li:nth-child(6) div {
                -webkit-animation-delay: 30s;
                -moz-animation-delay: 30s;
                -o-animation-delay: 30s;
                -ms-animation-delay: 30s;
                animation-delay: 30s;
            }
            /* Animation for the slideshow images */
            @-webkit-keyframes imageAnimation { 
                0% {
                    opacity: 0;
                    -webkit-animation-timing-function: ease-in;
                }
                8% {
                    opacity: 1;
                    -webkit-transform: scale(1.05);
                    -webkit-animation-timing-function: ease-out;
                }
                17% {
                    opacity: 1;
                    -webkit-transform: scale(1.1);
                }
                25% {
                    opacity: 0;
                    -webkit-transform: scale(1.1);
                }
                100% { opacity: 0 }
            }
            @-moz-keyframes imageAnimation { 
                0% {
                    opacity: 0;
                    -moz-animation-timing-function: ease-in;
                }
                8% {
                    opacity: 1;
                    -moz-transform: scale(1.05);
                    -moz-animation-timing-function: ease-out;
                }
                17% {
                    opacity: 1;
                    -moz-transform: scale(1.1);
                }
                25% {
                    opacity: 0;
                    -moz-transform: scale(1.1);
                }
                100% { opacity: 0 }
            }
            @-o-keyframes imageAnimation { 
                0% {
                    opacity: 0;
                    -o-animation-timing-function: ease-in;
                }
                8% {
                    opacity: 1;
                    -o-transform: scale(1.05);
                    -o-animation-timing-function: ease-out;
                }
                17% {
                    opacity: 1;
                    -o-transform: scale(1.1);
                }
                25% {
                    opacity: 0;
                    -o-transform: scale(1.1);
                }
                100% { opacity: 0 }
            }
            @-ms-keyframes imageAnimation { 
                0% {
                    opacity: 0;
                    -ms-animation-timing-function: ease-in;
                }
                8% {
                    opacity: 1;
                    -ms-transform: scale(1.05);
                    -ms-animation-timing-function: ease-out;
                }
                17% {
                    opacity: 1;
                    -ms-transform: scale(1.1);
                }
                25% {
                    opacity: 0;
                    -ms-transform: scale(1.1);
                }
                100% { opacity: 0 }
            }
            @keyframes imageAnimation { 
                0% {
                    opacity: 0;
                    animation-timing-function: ease-in;
                }
                8% {
                    opacity: 1;
                    transform: scale(1.05);
                    animation-timing-function: ease-out;
                }
                17% {
                    opacity: 1;
                    transform: scale(1.1);
                }
                25% {
                    opacity: 0;
                    transform: scale(1.1);
                }
                100% { opacity: 0 }
            }
            /* Animation for the title */
            @-webkit-keyframes titleAnimation { 
                0% {
                    opacity: 0;
                    -webkit-transform: translateY(200px);
                }
                8% {
                    opacity: 1;
                    -webkit-transform: translateY(0px);
                }
                17% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                }
                19% { opacity: 0 }
                25% {
                    opacity: 0;
                    -webkit-transform: scale(10);
                }
                100% { opacity: 0 }
            }
            @-moz-keyframes titleAnimation { 
                0% {
                    opacity: 0;
                    -moz-transform: translateY(200px);
                }
                8% {
                    opacity: 1;
                    -moz-transform: translateY(0px);
                }
                17% {
                    opacity: 1;
                    -moz-transform: scale(1);
                }
                19% { opacity: 0 }
                25% {
                    opacity: 0;
                    -moz-transform: scale(10);
                }
                100% { opacity: 0 }
            }
            @-o-keyframes titleAnimation { 
                0% {
                    opacity: 0;
                    -o-transform: translateY(200px);
                }
                8% {
                    opacity: 1;
                    -o-transform: translateY(0px);
                }
                17% {
                    opacity: 1;
                    -o-transform: scale(1);
                }
                19% { opacity: 0 }
                25% {
                    opacity: 0;
                    -o-transform: scale(10);
                }
                100% { opacity: 0 }
            }
            @-ms-keyframes titleAnimation { 
                0% {
                    opacity: 0;
                    -ms-transform: translateY(200px);
                }
                8% {
                    opacity: 1;
                    -ms-transform: translateY(0px);
                }
                17% {
                    opacity: 1;
                    -ms-transform: scale(1);
                }
                19% { opacity: 0 }
                25% {
                    opacity: 0;
                    -webkit-transform: scale(10);
                }
                100% { opacity: 0 }
            }
            @keyframes titleAnimation { 
                0% {
                    opacity: 0;
                    transform: translateY(200px);
                }
                8% {
                    opacity: 1;
                    transform: translateY(0px);
                }
                17% {
                    opacity: 1;
                    transform: scale(1);
                }
                19% { opacity: 0 }
                25% {
                    opacity: 0;
                    transform: scale(10);
                }
                100% { opacity: 0 }
            }
            /* Show at least something when animations not supported */
            .no-cssanimations .slideshow li span{
                opacity: 1;
            }
            @media screen and (max-width: 1140px) { 
                .slideshow li div h3 { font-size: 100px }
            }
            @media screen and (max-width: 600px) { 
                .slideshow li div h3 { font-size: 50px }
            }
        </style>
    </head>

<body class="text-center" style="background-color: #4c6bb4;">


    <ul class="slideshow">
  <li><span>Image 01</span></li>
  <li><span>Image 02</span></li>
  <li><span>Image 03</span></li>
  <li><span>Image 04</span></li>
  <li><span>Image 05</span></li>
  <li><span>Image 06</span></li>
</ul>




        <div style="width: 100%; position: fixed;top: 0;" id="container-alert">
        </div>
        <img src="imagenes/cm2.png" style="width: 150px; height: 100px; position: fixed; top: 37px;">
        
        <div class="form-control" style="background-color: transparent;border: 1px solid transparent;">   
            <br><br><br><br>
            <div style="opacity: 0.9;margin:0px auto; background-color: #474747; height: 400px; border-radius: 10px;-webkit-box-shadow: 0px 0px 39px -9px rgba(38,38,38,1);
                 -moz-box-shadow: 0px 0px 39px -9px rgba(38,38,38,1);
                 box-shadow: 0px 0px 39px -9px rgba(38,38,38,1);" class="col-md-4">
                <form enctype="multipart/form-data" class="form-signin" method="POST" id="form-login">
                    <img class="mb-4" src="imagenes/logo.png" alt="" width="170" height="75">
                    <h1 class="h3 mb-3 font-weight-normal" style="color: #fff; font-size: 22px;">ISC Control</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" id="user" class="form-control" placeholder="Nombre de Usuario" style="border-radius: 1px; border: 1px solid #ced4da;" required>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="pass" class="form-control" placeholder="Contraseña" style="border-radius: 1px; border: 1px solid #ced4da;" required>
                    <div class="checkbox col-md-12">
                        <label>
                            <label style="color: #fff;"> Recordar mi cuenta <input type="checkbox" value="remember-me"></label>
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #546ab1;color: #fff;border: 1px solid #435896;">Iniciar Sesion</button>
                </form>
            </div>
        </div>
        <div style="position: fixed; bottom: 90px;">
            <img src="imagenes/images-build-old.png" class="button-float" onclick="showProveedores();" style="opacity: 0.7;">
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