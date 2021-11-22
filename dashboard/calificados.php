<?php require_once "vistas/parte_superior.php"?> 

<!--INICIO del cont principal-->
<div class="container">
    <h1>Editar Calificación Documentación
        
    </h1>   
 <?php
include_once '../bd/conexion.php';

$variable =  $_SESSION["s_usuario"];
include_once '../bd/conexion.php';
$query = "SELECT i.id_tesis,  string_agg(per.nombre|| ' ' || per.apepate, ', ') AS nombresestudiante,  i.tema_nom, f.nombre, i.carrera, i.modalidad  FROM informe_tesis i, personas per, facultades f WHERE i.estudiante = per.cedula AND i.facultad=f.idfacultad GROUP BY 1, 3,4,5,6;";
$consulta = pg_query($conexion, $query);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tablaCalificado" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id Tesis</th>
                            <th>Nombres y Apellidos</th>
                            <th>Tema</th>
                            <th>Facultad</th>
                            <th>Carrera</th>
                            <th>Modalidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($dat = pg_fetch_array($consulta)) {

                        ?>
                            <tr>
                                <td><?php echo $dat['id_tesis'] ?></td>
                                <td><?php echo $dat['nombresestudiante'] ?></td>
                                <td><?php echo $dat['tema_nom'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['carrera'] ?></td>
                                <td><?php echo $dat['modalidad'] ?></td>
                                <td></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action= "../bd/crud.php" method="POST" id="formPersonas">    
            <div class="modal-body">
            <div class="form-group">
                <label for="cedula_estudiante"   class="col-form-label">Nombres de los estudiantes :</label>
                <input type="number "  readonly="readonly" class="form-control"  id="nombresestudiante" name="nombresestudiante" >
                </div>
            <div class="form-group">
                <label for="cedula_docente" style="display:none"  class="col-form-label">Cedula del docente:</label>
                <input type="number" readonly="readonly"  class="form-control" style="display:none" id="cedula_docente" name="cedula_docente" >
                </div>
                <div class="form-group">
                <label for="cali_doc" class="col-form-label">Calificación de la Documentación:</label>
                <input type="number" step ="0.01" class="form-control"  id="cali_doc" name="cali_doc">
                </div>
                <div class="form-group">
                <label for="cali_susten" class="col-form-label">Calificación de la sustentación:</label>
                <input type="number" step ="0.01" class="form-control" id="cali_susten" name="cali_susten">
                </div>                
                           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="btnGuardar1" id="btnGuardar1" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
</div>
</script>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>


