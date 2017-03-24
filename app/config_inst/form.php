<!DOCTYPE html>
<html>
	<?php {
		include("../../config/globals.php");
		include("../../includes/head.php");
		} ?>
<body>
<?php

$user_id=null;
$sql1= "select * from config_inst where id = ".$_GET["id"];
$query = $con->query($sql1);
$config_inst = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $config_inst=$r;
  break;
}

  }
?>

<?php if($config_inst!=null):?>

  <form class="frm" action="update.php" method="POST">
  <center>
  <a  href="../../"style="text-align: center;">Back</a>
  <h1>Parametros del sistema</h1>
  <hr>
  </center>

  <div class="form-group row">

  <label for="codigo_inst" class="col-2 col-form-label">Código de la Institución</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->codigo_inst; ?>" name="codigo_inst">
  </div>
  <br>

  
  <label for="nombre_inst" class="col-2 col-form-label">Nombre de la Institución</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->nombre_inst; ?>" name="nombre_inst">
  </div>
  <br>

  <label for="regional" class="col-2 col-form-label">Regional</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->regional; ?>" name="regional">
  </div>
  <br>

  
  <label for="director" class="col-2 col-form-label">Director(a) de la Institución</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->director; ?>" name="director">
  </div>
  <br>

  
  <label for="Profesor" class="col-2 col-form-label">Profesor(a)</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->profesor; ?>" name="profesor">
  </div>
  <br>

  <label for="identificacion" class="col-2 col-form-label">Identificación</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->identificacion; ?>" name="identificacion">
  </div>
  <br>

  
  <label for="email" class="col-2 col-form-label">Email</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $config_inst->email; ?>" name="email">
  </div>
  <br>
<input type="hidden" name="id" value="<?php echo $config_inst->id; ?>">

  <br>
  <button class="btn btn-success" style="width: 100%; height: 40px!important">Actualizar</button>
</div>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra el registro solicitado</p>
<?php endif;?>
	
</form>
</body>
</html>