<!DOCTYPE html>
<html>
	<?php include("../../config/globals.php"); ?>
	<?php include("../../includes/head.php"); ?>
	<?php include("../../includes/header.php"); ?>
<body>

<input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="Imprimir Informe de evaluacion" style="float: right" />

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
$sql2= "select * from secciones where id = ".$_GET["id"];
$query = $con->query($sql2);
$secciones = null;
if($query->num_rows>0){
while ($s=$query->fetch_object()){
  $secciones=$s;
  break;
}

  }
?>



<?php 
		

		{
		$user_id=null;
		$sql3= "select * from estudiantes where seccion_id=".$_GET["id"];
		$query = $con->query($sql3);
		}
?>



<div id="printableArea">

<?php if($query->num_rows>0):?>
<!-- While -->
<?php while ($es=$query->fetch_array()):?>

<?php $estudiante_id = $es->id ?>
<!-- PENDIENTE -->

	<img src="../../assets/images/head_informes.png" style="width: 400px">
<h1>Informe de Evaluaciones</h1>


	<label style="padding: 0; margin: 0">Estudiante:</label>
		<?php echo  $es["apellido_1"]." ". $es["apellido_2"]." ".$es["nombre_1"]." ". $es["nombre_2"]; ?>
	<br>
	<label style="padding: 0; margin: 0">Identificación:</label>
		<?php echo  $es["identificacion"]; ?>
		<?php $estudiante_id =  $es["id"]; ?>
	<br>
	<label style="padding: 0; margin: 0">Periodo Escolar:</label>
		<?php echo "I Periodo"; ?><br>
	<label style="padding: 0; margin: 0">Seccion:</label>
		<?php echo $secciones->seccion; ?>



<!-- While -->


	<?php {

		$host="localhost";
		$user="root";
		$password="disow32245";
		$db="educacion_especial";

		 $conexion=mysql_connect($host,$user,$password);
		 mysql_select_db($db,$conexion);
		
		 //  Consulta Mysql donde aplicamos INNER JOIN

		  $consulta_mysql="select calificaciones.porcentajeEvaluacion, calificaciones.tipoCalificacion, calificaciones.fechaEvaluacion, calificacionesestudiantes.porcentajeObtenido, calificacionesestudiantes.estudiante_id, estudiantes.apellido_1,estudiantes.apellido_2, estudiantes.nombre_1, estudiantes.nombre_2, estudiantes.identificacion 
                     from calificaciones
                         inner join calificacionesestudiantes on calificaciones.id=calificacionesestudiantes.calificacion_id
                         
                         inner join estudiantes on 
                         	estudiantes.id = calificacionesestudiantes.estudiante_id where estudiante_id=$estudiante_id and periodoEscolar = 'I Periodo' order by tipoCalificacion";



		 $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
		  
		 //  Navegamos cada fila que devuelve la consulta mysql y la imprimimos en pantalla
		

		 echo " <table>
		 <tr>
		 	<th>Tipo de Evaluacion</th>
		 	<th>Fecha de Evaluacion</th>
		 	<th>Porcentage Evaluado</th>
		 	<th>Porcentage Obtenido</th>
		 </tr>

		 <br>";


		 while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		 
echo "
		  <tr>
            <td> $fila[tipoCalificacion]</td>
            <td> $fila[fechaEvaluacion]</td>
            <td> $fila[porcentajeEvaluacion]</td>
            <td> $fila[porcentajeObtenido]</td>
            </tr>
         
          <br>"	;}
         
		} echo "</table>" ?>

	<br><br>
	____________________________________ <br>
	Licenciado(a): <?php echo $profesor ?> &nbsp; <br>
	Identificación: <?php echo $profesor_id ?> &nbsp; 
	<br><br>
	<hr style="page-break-after: always";>

<?php endwhile; ?>
<?php endif; ?>
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