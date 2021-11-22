$(function () {
  getFacultades();
});

function getFacultades() {
  const cedula = $.trim(ced);
  $.ajax({
    url: "procesar.php",
    type: "POST",
    dataType: "json",
    data: { func: "getFacultades", cedula },
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
}

//tabla de criterios
$(function getCriterio() {
  const cedula = $.trim(ced);
  $.ajax({
    url: "procesar.php",
    type: "POST",
    dataType: "json",
    data: { func: "getCriterio", cedula },
    success: function (data) {
      var table = $("#TablaCriterio").DataTable({
        aaData: data,
        columns: [{ data: "nombre" }, { data: "tipo" }, { data: "nota" }],
        dom: "Bfrtip",
        select: "single",
        responsive: true,
        altEditor: true,
        destroy: true,
        ordering: false,
        searching: false,
        buttons: [
          {
            extend: "selected",
            text: "Editar",
            action: () => {
              $(".modal-header").css("background-color", "#4e73df");
              $(".modal-header").css("color", "white");
              $(".modal-title").text("Actualizar criterio");
              var modal = new bootstrap.Modal(
                document.getElementById("modalEditCri")
              );
              modal.show();
              getFacultad(table.rows({ selected: true }).data()[0].idfacultad);
              $("#unom_cri").val(
                table.rows({ selected: true }).data()[0].nombre
              );
              $("#unota_cri").val(
                table.rows({ selected: true }).data()[0].nota
              );
              $("#uidcri").val(
                table.rows({ selected: true }).data()[0].id_criterio
              );
            },
          },
          {
            extend: "selected",
            text: "Eliminar",
            action: () => {
              $.ajax({
                url: "procesar.php",
                type: "POST",
                datatype: "json",
                data: {
                  func: "deleteCriterio",
                  id: table.rows({ selected: true }).data()[0].id_criterio,
                },
                success: (data) => {
                  if (data) {
                    location.reload();
                    alert("El criterio ha sido eliminado");
                  }
                },
              });
            },
          },
        ],
        paging: false,
        language: {
          lengthMenu: "Mostrar _MENU_ registros",
          zeroRecords: "No se encontraron resultados",
          info: "Registros del _START_ al _END_ de un total de _TOTAL_",
          infoEmpty:
            "Mostrando registros del 0 al 0 de un total de 0 registros",
          infoFiltered: "(filtrado de un total de _MAX_ registros)",
          sSearch: "Buscar:",
          sProcessing: "Procesando...",
        },
      }); //Cierre DATATABLE
    }, //Cierre Success
  }); //Cierre AJAX
});

$("#FormCri").submit((e) => {
  //e.preventDefault();
  const txt_nom_cri = $.trim($("#txt_nom_cri").val());
  const txt_tipo_cri = $.trim(
    $("input:radio[name=txt_tipo_cri]:checked").val()
  );
  const txt_nota_cri = $.trim($("#txt_nota_cri").val());
  const factCri = $.trim($("#FactCri").val());
  const cedula = $.trim(ced);
  data = {
    func: "CriterioPost",
    cedula,
    txt_nom_cri,
    txt_tipo_cri,
    txt_nota_cri,
    factCri,
  };

  // if (cedula.length == 9) {
  //   cedula = "0" + cedula;
  // }

  console.log(data);
  $.ajax({
    url: "procesar.php",
    type: "POST",
    datatype: "json",
    data,
    success: function (res) {},
  });
});

// funcion pa' obtener facultad por su id
function getFacultad(index) {
  $.ajax({
    url: "procesar.php",
    type: "POST",
    dataType: "json",
    data: { func: "getFacultad", index },
    success: function (data) {
      $("#FactCri1").append(
        "<option  selected  value=" +
          data[0].idfacultad +
          ">" +
          data[0].nombre +
          "</option>"
      );
    },
    error: function (data) {
      alert("error");
      console.error(data);
    },
  });
}

//funcion update criterio
$("#updateCri").submit((e) => {
  const unom_cri = $.trim($("#unom_cri").val());
  const utipo_cri = $.trim($("input:radio[name=utipo_cri]:checked").val());
  const unota_cri = $.trim($("#unota_cri").val());
  const uidcri = $.trim($("#uidcri").val());
  const ufactCri = $.trim($("#FactCri1").val());
  const ucedula = $.trim(ced);
  data = {
    func: "updateCrit",
    ucedula,
    uidcri,
    unom_cri,
    utipo_cri,
    unota_cri,
    ufactCri,
  };
  $.ajax({
    url: "procesar.php",
    type: "POST",
    datatype: "json",
    data,
    success: function (res) {
      console.log(res);
    },
  });
});
