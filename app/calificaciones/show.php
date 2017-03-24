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
$sql2= "select * from calificaciones where id = ".$_GET["calificacion_id"];
$query = $con->query($sql2);
$calificaciones = null;
if($query->num_rows>0){
while ($ca=$query->fetch_object()){
  $calificaciones=$ca;
  break;
}

  }
?>

<?php 
		{
		$user_id=null;
		$sql1= "select * from calificacionesestudiantes where calificacion_id=".$_GET["calificacion_id"];
		$query = $con->query($sql1);
		}
?>


<div id="printableArea">
<img src="../../assets/images/head_informes.png" style="width: 400px">

<hr>
<h3>Evaluación de <?php echo $ca->tipoCalificacion ?></h3>
<h3>Parametros de Calificación</h3>
	
	<label>Periodo Escolar:</label>    <?php echo $ca->periodoEscolar; ?><br>
	<label>Fecha de Evaluación:</label> <?php echo $ca->fechaEvaluacion; ?><br>
	<label>Objetivo de la Evaluacion:</label>  <?php echo $ca->objetivoEvaluacion; ?>   <br>
	<label>Porcentaje de la Evaluacion:</label> <?php echo $ca->porcentajeEvaluacion; ?>   &nbsp;&nbsp;&nbsp;&nbsp;\\
	<label>Puntos de la Evaluacion:</label> <?php echo $ca->puntosEvaluacion; ?><br>

<hr>
<h3>Tabla de Evaluación grupal</h3>
<?php if($query->num_rows>0):?>
	<table>
		<thead>
			<tr>
				<th style="text-align: left">Estudiante</th>
				<th>Identificación</th>
				<th>Puntos Obtenidos</th>
				<th>Porcentaje Obtenido</th>
				<th>Calificación</th>
			</tr>
		</thead>
			<?php while ($calificacion=$query->fetch_array()):?>
		<tbody>
			<tr>
				<?php $estudiante_id =  $calificacion["estudiante_id"];{

				$user_id=null;
				$sql3= "select * from estudiantes where id=".$estudiante_id;
				$query3 = $con->query($sql3);
				}
			?>
			<?php while ($estudiante=$query3->fetch_array()):?>
				<td><?php echo $estudiante["apellido_1"]." ".$estudiante["apellido_2"]." ".$estudiante["nombre_1"]." ".$estudiante["nombre_2"] ?>  &nbsp;  &nbsp;  &nbsp;  &nbsp; </td>
				<td><?php echo 	$estudiante["identificacion"] ?>  &nbsp;  &nbsp; </td>
				<td><?php echo $calificacion["puntosObtenidos"]; ?> &nbsp;  &nbsp; </td>
				<td><?php echo $calificacion["porcentajeObtenido"]; ?> &nbsp;  &nbsp; </td>
				<td><?php echo $calificacion["calificacion"]; ?> &nbsp;  &nbsp; </td>
			</tr>
		</tbody>
    <?php endwhile;?>
    <?php endwhile;?>
	</table>
	<br><br><br><br>
  					____________________________________ <br>
                    Profesor(a): <?php echo $profesor ?> &nbsp; <br>
                    Identificación: <?php echo $profesor_id ?> &nbsp; 
                    <br><br>
		
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>


				<input type="hidden" name="calificacion_id" value="<?php echo $_GET["calificacion_id"]; ?>">
				<br><br><br>
	</div>
		<input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="Imprimir Informe de evaluacion" />
<script type="text/javascript">
	      function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        w = window.open();

        w.document.write(printContents);
        w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10

        return true;
    }
</script>
</body>
</html>