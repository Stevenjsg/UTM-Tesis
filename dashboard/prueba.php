<?php require_once "vistas/parte_superior.php" ?>

<div class="container">
    <h2>Configuración</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12 h2 pb-3">
                            Configuración de criterios de calificacion del proyecto final
                        </div>
                        <div class="col-6 ">
                            <form action="" method="post" class="needs-validation" id='FormCri' novalidate>
                                <script language="JavaScript" type="text/javascript">
                                    let ced = '<?php echo $_SESSION['id']; ?>'
                                </script>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="FactCri" class="form-label">Facultades</label>
                                        <select class="form-select form-control" name='FactCri' aria-label="Default select example" id="FactCri" required>
                                            <option selected disabled value="">Seleccione...</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor seleccione una facultad.
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="txt_nom_cri" class="form-label">Nombre del criterio</label>
                                        <input name='txt_nom_cri' type="text" placeholder='' class="form-control" id="txt_nom_cri" required>
                                        <div class="invalid-feedback">Se requiere un nombre para el criterio</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-7">
                                        <label class="form-label">Tipo de criterio</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txt_tipo_cri" id="txt_tipo_doc" value="Documentación" required>
                                            <label class="form-check-label" for="txt_tipo_doc">
                                                Documentación
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txt_tipo_cri" id="txt_tipo_sus" value="Sustentación" required>
                                            <label class="form-check-label" for="txt_tipo_sus">
                                                Sustentación
                                            </label>
                                            <div class="invalid-feedback">Seleecione uno</div>
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <label for="txt_nota_cri" class="form-label">Nota maxima</label>
                                        <div class="">
                                            <input name='txt_nota_cri' type="number" class="form-control" id="txt_nota_cri" min="0" max="100" required>
                                            <div class="invalid-feedback">Se requiere nota maxima</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-10">
                                        <button class="btn btn-success" id='btnCriterio' type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="vr"></div>
                        <div class="col-6">
                            <div class="table-responsive-sm">
                                <table id="TablaCriterio" class="table table-striped table-bordered table-condensed" style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody id='listCriterio'>
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-bottom p-3" style="z-index: 11">
        <div class='toast align-items-center text-white bg-success border-0' role='alert' aria-live='assertive' aria-atomic='true' id="toast">
            <div class='d-flex'>
                <div class='toast-body'>Su criterio ha sido registrado. </div>
                <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
        </div>
    </div>


    <!--Modal para CRUD-->
    <div class="modal fade" id="modalEditCri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- creacion de form -->
                <form action="" method="POST" id="updateCri" class="needs-validation" novalidate>
                    <div class="modal-body" id='modal-body'>
                        <div class='row mb-3'>
                            <div class='col-sm-12'>
                                <label for='FactCri1' class='form-label'>Facultades</label>
                                <select class='form-select form-control' name='FactCri1' aria-label='Default select example' id='FactCri1' required>

                                </select>
                                <div class='invalid-feedback'>
                                    Por favor seleccione una facultad.
                                </div>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <div class='col-sm-12'>
                                <label for='txt_nom_cri' class='form-label'>Nombre del criterio</label>
                                <input name='txt_nom_cri' type='text' placeholder='' value='' class='form-control' id='unom_cri' required>
                                <div class='invalid-feedback'>Se requiere un nombre para el criterio</div>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <div class='col-sm-6'>
                                <label class='form-label'>Tipo de criterio</label>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='utipo_cri' id='utipo_doc' value='Documentación' required>
                                    <label class='form-check-label' for='utipo_doc'>
                                        Documentación
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='utipo_cri' id='utipo_sus' value='Sustentación' required>
                                    <label class='form-check-label' for='utipo_sus'>
                                        Sustentación
                                    </label>
                                    <div class='invalid-feedback'>Seleecione uno</div>
                                </div>
                            </div>
                            <div class='col-sm-3'>
                                <label for='txt_nota_cri' class='form-label'>ID</label>
                                <div class=''>
                                    <input name='txt_nota_cri' type='number' class='form-control' id='uidcri' value='' readonly>
                                    <div class='invalid-feedback'>Se requiere nota maxima</div>
                                </div>
                            </div>
                            <div class='col-sm-3'>
                                <label for='txt_nota_cri' class='form-label'>Nota maxima</label>
                                <div class=''>
                                    <input name='txt_nota_cri' type='number' class='form-control' id='unota_cri' value='' min='0' max='100' required>
                                    <div class='invalid-feedback'>Se requiere nota maxima</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                        <button type="submit" name="btnGuardar" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php require_once "vistas/parte_inferior.php" ?>
<script language="JavaScript" type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script> -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script language="JavaScript" type="text/javascript" src="./js/criterios.js"></script>
<script language="JavaScript" type="text/javascript" src="./js/validation.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.7/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>