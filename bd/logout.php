<?php
session_start();
unset($_SESSION["s_usuario"]);
unset($_SESSION["s_rol"]);
unset($_SESSION["id"]);
session_destroy();
header("Location:../index.php");
