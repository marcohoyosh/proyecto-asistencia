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