<?php
session_start();
require_once 'conexion.php';

//insertar sustentacion
if(isset($_POST['btnGuardar'])){

$variable1 =  $_SESSION["id"];
$cedula  = $_POST['cedula'];
$items = ($_POST['cali_susten']);
$item1s =($_POST['justificacion']);
$item2s =($_POST['id_criterio']);



while(true) {
  
   $item = current ($items);
   $item1 = current ($item1s);
   $item2 = current ($item2s);
  

   $cali=(( $item !== false) ? $item : ", &nbsp;");
   $jus = (( $item1 !== false) ? $item1 : ", &nbsp;");
   $ced=(($variable1 !==false ) ? $variable1 : ", &nbsp;");
   $cedes=(($cedula !==false ) ? $cedula : ", &nbsp;");
   $id_cri=(($item2 !==false ) ? $item2 : ", &nbsp;");
 
   $valores="('".$ced."','".$cedes."','".$id_cri."','".$cali."','".$jus."'),";
   

   $valoresQ= substr($valores, 0, -1);
  
$obj = new Conexion();
$conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
$query = "INSERT INTO notas_criterios(ci_tribunal, ci_estudiante, id_criterio, nota,justificacion) VALUES $valoresQ";	
$consulta = pg_query($conexion, $query);

$variable1 =  $_SESSION["id"];
$cedula  = $_POST['cedula'];

    $item =next ($items);
    $item1= next($item1s);
    $item2=  next ($item2s);

if($item==false && $item1 == false && $item2 ==false)break;

}
   
$query1 = "SELECT sum (nc.nota) AS sumatoria FROM notas_criterios nc, criterio cr WHERE cr.id_criterio=nc.id_criterio AND nc.ci_estudiante = '$cedula' AND nc.ci_tribunal='$variable1' AND cr.tipo='Sustentación';";	 
$consulta1 = pg_query($conexion, $query1); 
echo $query1;


while ($dat = pg_fetch_array($consulta1)) { 
$sumatoria_sustentacion = $dat['sumatoria'];
echo $sumatoria_sustentacion ;

}
$query2 = "SELECT sum (nc.nota) AS sumatoria FROM notas_criterios nc, criterio cr WHERE cr.id_criterio=nc.id_criterio AND nc.ci_estudiante = '$cedula' AND nc.ci_tribunal='$variable1' AND cr.tipo='Documentación';";	 
$consulta2 = pg_query($conexion, $query2); 
 echo $query2; 

while ($dat = pg_fetch_array($consulta2)) { 

$sumatoria_documentacion = $dat['sumatoria'];
echo $sumatoria_documentacion ;

}

$promedio= ($sumatoria_documentacion+$sumatoria_sustentacion)/2;
$obj = new Conexion();
$conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
$query3 = "INSERT INTO notas VALUES (".$sumatoria_documentacion.",".$sumatoria_sustentacion.",".$promedio.",'".$variable1."','".$cedula."')";	 
$consulta3 = pg_query($conexion, $query3); 
 echo $query3;

 
$query4 = "SELECT AVG (promedio) AS promedio FROM notas WHERE ci_estudiante='".$cedula."';";	 
$consulta4 = pg_query($conexion, $query4); 


while ($dat = pg_fetch_array($consulta4)) { 
  $promediofinal = $dat['promedio'];
  echo $promediofinal;
  
  }
  $obj = new Conexion();
  $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
  $query5 = "UPDATE informe_tesis SET promedio_final=$promediofinal WHERE estudiante='".$cedula."';";	 
  $consulta5 = pg_query($conexion, $query5); 
  echo $query5;

 
}


 //insertar Documentacion 
if(isset($_POST['btnGuardar1'])){
  $variable1 =  $_SESSION["id"];
  $items = ($_POST['cali_doc']);
  $item1s =($_POST['justificacion']);
  $item2s =($_POST['id_criterio']);
  $id_tesis = ($_POST['id_tesis']);

  $obj = new Conexion();
  $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
  $query1 = "SELECT estudiante FROM informe_tesis WHERE id_tesis = $id_tesis";	
  $consulta1 = pg_query($conexion, $query1); 
    $cedula = array();
    $cont =0;
    while ($dat = pg_fetch_array($consulta1)) {
      $cedula[$cont] = $dat['estudiante'];
      $cont++;

foreach ($cedula as $valor) {
  echo $valor;
  }
  while(true) {
    
     $item = current ($items);
     $item1 = current ($item1s);
     $item2 = current ($item2s);
   
    
     $cali=(( $item !== false) ? $item : ", &nbsp;");
     $jus = (( $item1 !== false) ? $item1 : ", &nbsp;");
     $ced=(($variable1 !==false ) ? $variable1 : ", &nbsp;");
     $cedes=(($valor !==false ) ? $valor : ", &nbsp;");
     $id_cri=(($item2 !==false ) ? $item2 : ", &nbsp;");
   
     $valores="('".$ced."','".$cedes."','".$id_cri."','".$cali."','".$jus."'),";
     
  
     $valoresQ= substr($valores, 0, -1);
    
   
  $query = "INSERT INTO notas_criterios(ci_tribunal, ci_estudiante, id_criterio, nota,justificacion) VALUES $valoresQ";	
  $consulta = pg_query($conexion, $query);  
  

      $item =next ($items);
      $item1= next($item1s);
      $item2=  next ($item2s);
     
  
  if($item==false && $item1 == false && $item2 ==false)break;
  
  }
  $variable1 =  $_SESSION["id"];
  $items = ($_POST['cali_doc']);
  $item1s =($_POST['justificacion']);
  $item2s =($_POST['id_criterio']);
  $id_tesis = ($_POST['id_tesis']);
  }

  }

 //modificar 
  if (isset($_POST['btnGuardar1'])){
    
    
}





