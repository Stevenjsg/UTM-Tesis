<?php require_once "vistas/parte_superior.php" ?>

<?php
include_once '../bd/conexion.php';
$query = "SELECT * FROM facultades;";
$consulta = pg_query($conexion, $query);
$data = pg_fetch_all($consulta);
echo $_SESSION['s_usuario'];
//print_r($data);
?>


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
                            <form action="" method="post" class="needs-validation" id='formCri' novalidate>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <select class="form-select form-select-lg" aria-label="Default select example" id="factCri">
                                            <option selected>Elija facultad</option>
                                            <--! Creacion de item para el select-->
                                                <?php foreach ($data as $dat => $array) {
                                                    echo '<option  value="' . $array['idfacultad'] . '">' . $array['nombre'] . '</option>';
                                                } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="txt_nom_cri" class="form-label">Nombre del criterio</label>
                                        <input name='nomCri' type="text" placeholder='' class="form-control" id="txt_nom_cri">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-7">
                                        <label for="txt_tipo_cri" class="form-label">Tipo de criterio</label>
                                        <div class="">
                                            <input name='tipoCri' type="text" placeholder='' class="form-control" id="txt_tipo_cri">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="txt_nota_cri" class="form-label">Nota maxima</label>
                                        <div class="">
                                            <input name='notaCri' type="text" class="form-control" id="txt_nota_cri">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-10">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="vr"></div>
                        <div class="col-6">
                            . col-6<br>Subsequent columns continue along the new line.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "vistas/parte_inferior.php" ?>
<script language="JavaScript" type="text/javascript" src="./js/criterios.js"></script>
<script type="text/javascript">
    var idsesion = "<?php $_SESSION['s_usuario']; ?>";
</script>