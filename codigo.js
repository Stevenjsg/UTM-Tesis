$("#formLogin").submit(function (e) {
  e.preventDefault();
  var usuario = $.trim($("#usuario").val());
  var password = $.trim($("#password").val());

  if (usuario.length == "" || password == "") {
    Swal.fire({
      type: "warning",
      title: "Debe ingresar un usuario y/o password",
    });
    return false;
  } else {
    $.ajax({
      url: "bd/login.php",
      type: "POST",
      datatype: "json",
      data: { usuario: usuario, password: password },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            type: "error",
            title: "Usuario y/o password incorrecta",
          });
        } else {
          console.log(data);
          if (data[0] == 2) {
            window.location.href = "dashboard/cali_susten.php";
          }
          if (data[0] == 1) {
            window.location.href = "dashboard/inicio.php";
          } else if (data[0] == 3) {
            window.location.href = "admin/prueba.php";
          }
        }
      },
    });
  }
});
