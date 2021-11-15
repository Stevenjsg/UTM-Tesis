<?php require_once "vistas/parte_superior.php" ?>

<div class="container">
    <h2>Configuración</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12 h2 pb-3">
                            Configuración de criterios
                        </div>
                        <div class="col-6 ">
                            <form action="" method="post" class="needs-validation" id='FormCri' novalidate>
                                <script language="JavaScript" type="text/javascript">
                                    let cedula = '' + <?php echo $_SESSION['id']; ?>
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
                            <ul class="list-group" id="listCriterio">

                            </ul>
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
</div>


<?php require_once "vistas/parte_inferior.php" ?>
<script language="JavaScript" type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="./js/criterios.js"></script>
<script language="JavaScript" type="text/javascript" src="./js/validation.js"></script>