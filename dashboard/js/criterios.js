$("#formCri").submit((e) => {
  e.preventDefault();
  const txt_nom_cri = $.trim($("#txt_nom_cri").val());
  const txt_tipo_cri = $.trim($("#txt_tipo_cri").val());
  const txt_nota_cri = $.trim($("#txt_nota_cri").val());
  const factCri = $.trim($("#factCri").val());

  if (cedula.length == 9) {
    cedula = "0" + cedula;
  }

  data = {
    id: cedula,
    txt_nom_cri,
    txt_tipo_cri,
    txt_nota_cri,
    factCri,
  };
  $.ajax({
    url: "procesar.php",
    type: "POST",
    datatype: "json",
    data,
    success: function (res) {
      console.log("data ajax:" + res);
    },
  });
});
