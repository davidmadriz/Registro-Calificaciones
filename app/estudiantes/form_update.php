<!DOCTYPE html>
<html>
  <?php {
    include("../../config/globals.php");
    include("../../includes/head.php");
    } ?>
<body>
<?php

$user_id=null;
$sql1= "select * from estudiantes where id = ".$_GET["id"];
$query = $con->query($sql1);
$estudiantes = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $estudiantes=$r;
  break;
}

  }
?>
<form action="update.php" method="POST" class="frm">
<center>
  <a  href="../../index.php"style="text-align: center;">Back</a>
  <h1>Nuevo Estudiante</h1>
  <hr>
  </center>


<div class="form-group row">

  <label for="apellido_1" class="col-2 col-form-label">Apellido 1</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $estudiantes->apellido_1; ?>" name="apellido_1">
  </div>
  <br>

  <label for="apellido_2" class="col-2 col-form-label">Apellido 2</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $estudiantes->apellido_2; ?>" name="apellido_2">
  </div>
  <br>

   <label for="nombre_1" class="col-2 col-form-label">Nombre 1</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $estudiantes->nombre_1; ?>" name="nombre_1">
  </div>
  <br>

  <label for="nombre_2" class="col-2 col-form-label">Nombre 2</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $estudiantes->nombre_2; ?>" name="nombre_2">
  </div>
  <br>

  <label for="identificacion" class="col-2 col-form-label">Identificación</label>
  <div class="col-10">
    <input class="form-control" type="number" value="<?php echo $estudiantes->identificacion; ?>" name="identificacion">
  </div>
  <br>

 <label for="dob" class="col-2 col-form-label">Fecha de Nacimiento</label>
  <div class="col-10">
    <input class="form-control" type="date" value="<?php echo $estudiantes->dob; ?>" name="dob">
  </div>
  <br>

  <label for="sexo" class="col-2 col-form-label">Sexo</label>
<div class="col-10">
    <select value="<?php echo $estudiantes->sexo; ?>" name="sexo" class="form-control">
      <option>Masculino</option>
      <option>Femenino</option>
    </select>
  </div>
 
  <br>

   <label for="edad" class="col-2 col-form-label">Edad</label>
  <div class="col-10">
    <input class="form-control" type="number" value="<?php echo $estudiantes->edad; ?>" name="edad">
  </div>
  <br>

  <label for="situacion_actual" class="col-2 col-form-label">Situación Actual</label>
 <div class="col-10">
    <select value="<?php echo $estudiantes->situacion_actual; ?>" name="situacion_actual" class="form-control">
      <option>Activo</option>
      <option>Desertó</option>
      <option>Repitiendo</option>
    </select>
  </div>
 
 

  <input type="hidden" name="id" value="<?php echo $estudiantes->id; ?>">

  <br>
  <br>
	<center><button type="submit" style="width: 100%; height: 50px!important;" class="btn btn-danger">Guardar</button></center>

	
</form>
</body>
</html>