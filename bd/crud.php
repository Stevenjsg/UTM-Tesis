<?php
session_start();
require_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//insertar 
if(isset($_POST['btnGuardar'])){
$variable1 =  $_SESSION["s_usuario"];
$consulta1 = "SELECT  cedula FROM usuarios WHERE usuario='$variable1'";
$resultado1 = $conexion->prepare($consulta1);
$resultado1->execute();
$data=$resultado1->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dat){
 $dat['cedula'];
 $variable2=$dat['cedula'];

$cedula =$_POST['cedula'];
$cali_doc = $_POST['cali_doc'];
$cali_susten =$_POST['cali_susten'];
$promedio =($cali_doc + $cali_susten)/2 ;

$consulta = "INSERT INTO tesistas(cedula_docente, cedula_estudiante, cali_doc, cali_susten,promedio) VALUES('$variable2','$cedula','$cali_doc', '$cali_susten', '$promedio') ";	

$consultafinal= "UPDATE  grupo set calificacion= (SELECT Avg(promedio) FROM tesistas where cedula_estudiante='$cedula') where cedula='$cedula'";
 $resultado = $conexion->prepare($consulta);
 $resultado1 = $conexion->prepare($consultafinal);
 $resultado->execute();
 $resultado1->execute();

 

 }
 }

 //modificar 
  if (isset($_POST['btnGuardar1'])){
    
    $cedula_estudiante = $_POST['cedula_estudiante'];
    $cedula_docente = $_POST['cedula_docente'];
    $cali_doc = $_POST['cali_doc'];
    $cali_susten =$_POST['cali_susten'];
    $promedio =($cali_doc + $cali_susten)/2 ;

    $consulta1= "UPDATE tesistas SET cali_doc='$cali_doc', cali_susten='$cali_susten', promedio='$promedio' WHERE cedula_docente='$cedula_docente' AND cedula_estudiante='$cedula_estudiante'";		
    
    $consultafinal= "UPDATE  grupo set calificacion= (SELECT Avg(promedio) FROM tesistas where cedula_estudiante='$cedula_estudiante') where cedula='$cedula_estudiante'";
    $resultado = $conexion->prepare($consulta1);
    $resultado1 = $conexion->prepare($consultafinal);
    $resultado->execute();
    $resultado1->execute();
    
    
     

}



$var =  $_SESSION["s_usuario"];
$con = "SELECT  nombres FROM usuarios WHERE usuario='$var'";
$resul = $conexion->prepare($con);
$resul->execute();
$dato=$resul->fetchAll(PDO::FETCH_ASSOC);
foreach($dato as $da){
 $da['nombres'];
 $variab=$da['nombres'];

}


