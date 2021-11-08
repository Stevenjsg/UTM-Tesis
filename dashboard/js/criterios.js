$("#formCri").submit((e) => {
  e.preventDefault();
  const nom_crit = $.trim($("#txt_nom_cri").val());
  const tipo_crit = $.trim($("#txt_tipo_cri").val());
  const not_crit = $.trim($("#txt_nota_cri").val());
  const fact = $.trim($("#factCri").val());
  if (cedula.length == 9) {
    cedula = "0" + cedula;
  }
  data = {
    id: cedula,
    nom_crit,
    tipo_crit,
    not_crit,
    fact,
  };
  console.log(data);
});
