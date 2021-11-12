$(function getFacultades() {
  $.ajax({
    url: "procesar.php",
    type: "POST",
    dataType: "json",
    data: { func: "getFacultades" },
    success: function (data) {
      $.each(data, function (key, registro) {
        $("#FactCri").append(
          "<option value=" +
            registro.idfacultad +
            ">" +
            registro.nombre +
            "</option>"
        );
      });
    },
    error: function (data) {
      alert("error");
      console.error(data);
    },
  });
});

$(function getCriterio() {
  $.ajax({
    url: "procesar.php",
    type: "POST",
    dataType: "json",
    data: { func: "getCriterio" },
    success: function (data) {
      if (data.length > 0) {
        $.each(data, function (key, registro) {
          $("#listCriterio").append(
            "<li class='list-group-item'>" + registro.nombre + "</li>"
          );
        });
      } else {
        $("#listCriterio").append("<p>Ingrese un criterio</p>");
      }
    },
  });
});

$("#FormCri").submit((e) => {
  e.preventDefault();
  const txt_nom_cri = $.trim($("#txt_nom_cri").val());
  const txt_tipo_cri = $.trim($("#txt_tipo_cri").val());
  const txt_nota_cri = $.trim($("#txt_nota_cri").val());
  const factCri = $.trim($("#FactCri").val());

  // if (cedula.length == 9) {
  //   cedula = "0" + cedula;
  // }

  data = {
    func: "CriterioPost",
    cedula,
    txt_nom_cri,
    txt_tipo_cri,
    txt_nota_cri,
    factCri,
  };
  console.log(data);
  var noti = document.getElementById("toast");
  var t = new bootstrap.Toast(noti);
  $.ajax({
    url: "procesar.php",
    type: "POST",
    datatype: "json",
    data,
    success: function (res) {
      data = JSON.parse(res);
      if (data["success"] == "bien") {
        t.show();
        $("#listCriterio").append("<li class='list-group-item'>An item</li>");
      }
    },
  });
});
