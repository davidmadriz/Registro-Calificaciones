<!DOCTYPE html>
<html>
<head>
	<?php {
		include("../../config/globals.php");
		include("../../includes/header.php");
		include("../../includes/head.php");
		} ?>
</head>
<body>

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

<?php 
		{
		$user_id=null;
		$sql2= "select * from estudiantes where seccion_id=".$_GET["id"];
		$query = $con->query($sql2);
		}
?>


	<?php if($query->num_rows>0):?>
		<div id="printableArea">
		<img src="../../assets/images/head_informes.png" style="width: 400px">
		<h1>Listado de Estudiantes</h1>
		<pre>Sección: <span><?php echo $secciones->seccion; ?></span></pre>
		<pre>Año escolar: <span><?php echo "2017"; ?></span></pre>


		<hr>
		<table>
			<thead>
				<tr>
					<th>Apellido 1</th>
					<th>Apellido 2</th>
					<th>Nombre 1</th>
					<th>Nombre 2</th>
					<th>Identificación</th>
					<th>Fecha de <br> Nacimiento</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Situación Actual</th>

				</tr>
			</thead>
			<?php while ($r=$query->fetch_array()):?>
			<tr>
				<td><?php echo $r["apellido_1"]; ?></td>
				<td><?php echo $r["apellido_2"]; ?></td>
				<td><?php echo $r["nombre_1"]; ?></td>
				<td><?php echo $r["nombre_2"]; ?></td>
				<td><?php echo $r["identificacion"]; ?></td>
				<td><?php echo $r["dob"]; ?></td>
				<td><?php echo $r["sexo"]; ?></td>
				<td><?php echo $r["edad"]; ?></td>
				<td><?php echo $r["situacion_actual"]; ?></td>
			</tr>
			<?php endwhile;?>

			</table>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>

	<?php endif; ?>
	

	</div>
	<br><br>

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