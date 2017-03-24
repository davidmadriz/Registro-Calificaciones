<!DOCTYPE html>
<html>
  <?php include("../../config/globals.php"); ?>
  <?php include("../../includes/head.php"); ?>
  <?php include("../../includes/header.php"); ?>
<body>


    <?php 
          {
          $user_id=null;
          $sql1= "select * from config_inst";
          $query = $con->query($sql1);


          }
    ?>


      <?php while ($r=$query->fetch_array()){
      $institucion =  $r["nombre_inst"]; 
      $profesor =   $r["profesor"];               
      $profesor_id =   $r["identificacion"];               
      $director =   $r["director"];               
        } ?>

<?php

$user_id=null;
$sql1= "select * from secciones where id = ".$_GET["id"];
$query = $con->query($sql1);
$secciones = null;
if($query->num_rows>0){
while ($s=$query->fetch_object()){
  $secciones=$s;
  break;
}

  }
?>

     


<input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="Imprimir Informe de evaluacion" style="float: right" />

<div id="printableArea">
  <img src="../../assets/images/head_informes.png" style="width: 400px">

  <h1>Informe de Calificaciones</h1>
  

    <div style="padding: 10px; color: gray; font-family: sans-serif;">

        <label>Sección:</label> <span><?php echo $secciones->seccion; ?></span> &nbsp;&nbsp;//
        <label>Asignatura:</label> <span><?php echo $secciones->asignatura; ?></span>  &nbsp;&nbsp;//
        <label>Año Escolar:</label> <span><?php echo "2017"; ?></span>
    </div>


<?php $seccion_id = $_GET["id"] ?>

<?php
  $sql90= "SELECT identificacion, apellido_1, apellido_2, nombre_1, nombre_2, porcentajeObtenido
FROM ( SELECT estudiantes.identificacion AS identificacion, estudiantes.apellido_1 AS apellido_1, SUM(calificacionesestudiantes.porcentajeObtenido) AS porcentajeObtenido, estudiantes.apellido_2 AS apellido_2, estudiantes.nombre_1 AS nombre_1, estudiantes.nombre_2 AS nombre_2
    FROM estudiantes, calificacionesestudiantes
    WHERE calificacionesestudiantes.periodo = 'I Periodo' and estudiantes.id = calificacionesestudiantes.estudiante_id and estudiantes.seccion_id = $seccion_id 
    GROUP BY(estudiantes.identificacion)
) AS estudiantes
ORDER BY apellido_1  ASC";

$result1 = $con->query($sql90);
 
 // RETORNA UN array asociativo con todas las filas, indexado por los nombres de las columnas
$data1 =  $result1->fetch_all(MYSQLI_ASSOC);
$count_data1 = count($data1);
 
// PRUEBA EJECUTAR ESTO
// var_dump($result);
 ?>



 <?php
  $sql91= "SELECT identificacion, apellido_1, apellido_2, nombre_1, nombre_2, porcentajeObtenido
FROM ( SELECT estudiantes.identificacion AS identificacion, estudiantes.apellido_1 AS apellido_1, SUM(calificacionesestudiantes.porcentajeObtenido) AS porcentajeObtenido, estudiantes.apellido_2 AS apellido_2, estudiantes.nombre_1 AS nombre_1, estudiantes.nombre_2 AS nombre_2
    FROM estudiantes, calificacionesestudiantes
    WHERE estudiantes.id = calificacionesestudiantes.estudiante_id and calificacionesestudiantes.periodo = 'II Periodo' and estudiantes.seccion_id = $seccion_id
    GROUP BY(estudiantes.apellido_1)
) AS estudiantes
ORDER BY apellido_1 ASC";

$result2 = $con->query($sql91);
 
 // RETORNA UN array asociativo con todas las filas, indexado por los nombres de las columnas
$data2 =  $result2->fetch_all(MYSQLI_ASSOC);
$count_data2 = count($data2);
 
// PRUEBA EJECUTAR ESTO
// var_dump($result);
 ?>



 <?php
  $sql92= "SELECT identificacion, apellido_1, apellido_2, nombre_1, nombre_2, porcentajeObtenido
FROM ( SELECT estudiantes.identificacion AS identificacion, estudiantes.apellido_1 AS apellido_1, SUM(calificacionesestudiantes.porcentajeObtenido) AS porcentajeObtenido, estudiantes.apellido_2 AS apellido_2, estudiantes.nombre_1 AS nombre_1, estudiantes.nombre_2 AS nombre_2
    FROM estudiantes, calificacionesestudiantes
    WHERE estudiantes.id = calificacionesestudiantes.estudiante_id and calificacionesestudiantes.periodo = 'III Periodo'  and estudiantes.seccion_id = $seccion_id
    GROUP BY(estudiantes.apellido_1)
) AS estudiantes
ORDER BY apellido_1 ASC";

$result3 = $con->query($sql92);
 
 // RETORNA UN array asociativo con todas las filas, indexado por los nombres de las columnas
$data3 =  $result3->fetch_all(MYSQLI_ASSOC);
$count_data3 = count($data3);
 
// PRUEBA EJECUTAR ESTO
// var_dump($result);
 ?>



 <?php echo '<table>'.'<thead>'.'<tr>'.
   '<th>Estudiante</th>'.
   '<th>Identificación</th>'.
   '<th>I P</th>'.
   '<th>% I P</th>'.
   '<th>II P</th>'.
   '<th>% II P</th>'.
   '<th>III P</th>'.
   '<th>% III P</th>'.
   '<th>Anual</th>'.
   '<th>Condición</th>'.
   '</tr>'.'</thead>'
   ?>





<?php 
  
  echo '<tbody>'.'<tr>';

  for ($i = 0; $i < $count_data1 ; $i++) { 
  if ($i < $count_data1) {

      echo
    '<td>'.
          $data1[$i]['apellido_1']." ".
          $data1[$i]['apellido_2']." ".
          $data1[$i]['nombre_1']." ".
          $data1[$i]['nombre_2'].
    '</td>'.
    '<td>'.
          $data1[$i]['identificacion'].
    '</td>'.
    '<td>'.
          $periodoUno = $data1[$i]['porcentajeObtenido'].
    '</td>'.
    '<td>';

          // $nota1 = $periodoUno * 0.30.
         echo $nota1 = $periodoUno * 0.30 ;
  
   echo '</td>'.
    '<td>'.
          $periodoDos = $data2[$i]['porcentajeObtenido'].
    '</td>'.
    '<td>';

    echo $nota2 = $periodoDos * 0.30;

    echo '</td>'.
    '<td>'.
          $periodoTres = $data3[$i]['porcentajeObtenido'].
    '</td>'.
    '<td>';

    echo   $nota3 = $periodoTres * 0.40;

    echo '</td>'.
    '<td>'.
          $anual = $nota1 + $nota2 + $nota3 .
    '</td>'.
    '<td>';
           if ($anual > 65) {
             echo "Aprobado";
           }elseif ($anual < 65 ){
            echo "Aplazado";
           }
         
    echo '</td>'.'</tr>'
    ;
    
  }
  }
            echo'</tbody>'.'</table>';


 ?>








  <br><br><br><br><br>
  ____________________________________ <br>
  Licenciado(a): <?php echo $profesor ?> &nbsp; <br>
  Identificación: <?php echo $profesor_id ?> &nbsp; 
  <br><br>

</div>
    
<script type="text/javascript">
        function printDiv(divName) {
 //Get the HTML of div
        var divElements = document.getElementById(divName).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
</script>
</body>
</html>