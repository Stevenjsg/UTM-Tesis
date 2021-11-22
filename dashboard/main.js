$(document).ready(function () {
  tablaPersonas = $("#tablaPersonas").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnCalificar'>Calificar</button></div></div>",
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
  //botón Calificar
  $(document).on("click", ".btnCalificar", function () {
    fila = $(this).closest("tr");
    id_tesis = fila.find("td:eq(0)").text();
    nombresestudiante = fila.find("td:eq(1)").text();

    $("#id_tesis").val(id_tesis);
    $("#nombresestudiante").val(nombresestudiante);

    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Calificar");
    $("#modalCRUD").modal("show");
  });
});
$(document).ready(function () {
  tablaPersonas1 = $("#tablaPersonas1").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnCalificar'>Calificar</button></div></div>",
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
  //botón Calificar
  $(document).on("click", ".btnCalificar", function () {
    fila = $(this).closest("tr");
    cedula = fila.find("td:eq(1)").text();

    $("#cedula").val(cedula);

    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Calificar");
    $("#modalCRUD1").modal("show");
  });
});
$(document).ready(function () {
  tablaModal = $("#tablaModal").DataTable({
    columnDefs: [
      {
        targets: -1,
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
});

$(document).ready(function () {
  tablaCalificado = $("#tablaCalificado").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button></div></div>",
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });

  //botón EDITAR
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");

    cedula_docente = parseInt(fila.find("td:eq(0)").text());
    cedula_estudiante = parseInt(fila.find("td:eq(1)").text());
    cali_doc = fila.find("td:eq(2)").text();
    cali_susten = fila.find("td:eq(3)").text();

    $("#cedula_estudiante").val(cedula_estudiante);
    $("#cedula_docente").val(cedula_docente);
    $("#cali_doc").val(cali_doc);
    $("#cali_susten").val(cali_susten);

    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Calificación");
    $("#modalCRUD1").modal("show");
  });
});
