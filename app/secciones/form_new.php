<!DOCTYPE html>
<html>
	<?php {
		include("../../config/globals.php");
		include("../../includes/head.php");
		} ?>
<body>


<form action="new.php" method="POST" class="frm">
<center>
  <a  href="./"style="text-align: center;">Back</a>
  <h1>Nueva Sección</h1>
  <hr>
  </center>


<div class="form-group row">

  <label for="grado" class="col-2 col-form-label">Grado</label>
  <div class="col-10">
    <input class="form-control" type="text" name="grado">
  </div>
  <br>

  <label for="seccion" class="col-2 col-form-label">Sección</label>
  <div class="col-10">
    <input class="form-control" type="text" name="seccion">
  </div>
  <br>

  <label for="asignatura" class="col-2 col-form-label">Asignatura</label>
  <div class="col-10">
    <input class="form-control" type="text" name="asignatura">
  </div>
  <br>
  <br>
	<center><button type="submit" style="width: 100%; height: 50px!important;" class="btn btn-danger">Guardar</button></center>

	
</form>
</body>
</html>