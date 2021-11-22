<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Editar la Sustentación</h1>
    <?php
    include_once '../bd/conexion.php';
    $query = "SELECT id_tesis, cedula, (per.nombre|| ' ' || per.apepate) AS nombresestudiante, tema_nom ,f.nombre, carrera, modalidad FROM informe_tesis i, personas per, facultades f WHERE i.estudiante= per.cedula AND i.facultad= f.idfacultad";
    $consulta = pg_query($conexion, $query);

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas1" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id Tesis</th>
                                <th>Cedula</th>
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
                                    <td><?php echo $dat['cedula'] ?></td>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../bd/crud.php" method="POST" id="formPersonas">
                    <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
                        <div class="form-group">
                            <label for="cedula" class="col-form-label">Cedula del estudiante:</label>
                            <input type="text" readonly="readonly" class="form-control" size=100 style="width:200px" id="cedula" name="cedula">
                        </div>
                        <?php
                        $items = $_POST['cedula'];
                        include_once '../bd/conexion.php';
                        $query = "SELECT c.id_criterio, c.nombre, c.nota, n.nota as notas FROM criterio c, notas_criterios n WHERE tipo='Sustentacion' AND n.ci_estudiante='$items'";
                        $consulta = pg_query($conexion, $query);

                        ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="tablaModal" class="table table-striped table-bordered table-condensed" style="width:100%">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Id Criterio</th>
                                                    <th>Criterio</th>
                                                    <th>Nota</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($dat = pg_fetch_array($consulta)) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $dat['id_criterio'] ?></td>
                                                        <td><?php echo $dat['nombre'] ?></td>
                                                        <td><?php echo $dat['notas'] ?></td>
                                                        <td><input type="text" class="form-control" name="editar[]" id="editar" placeholder="" size=80 style="width:80px" required></td>
                                                    </tr>
                                                    <input type="number" style="display:none" value="<?php echo $dat['id_criterio'] ?>" class="form-control" size=100 style="width:200px" id="id_criterio[]" name="id_criterio[]">

                                                <?php
                                                }

                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btnGuardar" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</script>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>