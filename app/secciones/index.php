<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php {
      include("../../includes/head.php") ;
      include("../../config/globals.php");

      }
      ?>
</head>
<body>
  <?php include("../../includes/header.php") ?>

<hr>
  <H1>Listado de Secciones</H1><a href="../secciones/form_new.php">Nueva Seccion</a>
<hr>
              

              <?php 
          {
          $user_id=null;
          $sql1= "select * from secciones";
          $query = $con->query($sql1);
          }
      ?>



      <?php while ($r=$query->fetch_array()):?>


<a href="../secciones/show.php?id=<?php echo $r["id"]; ?>">
                   <div class="col-md-3 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-graduation-cap"></i>
                </span>
                <div class="text-box link" >
                    <p class="main-text link"><?php echo $r["seccion"]; ?></p> <br>
                    <p class="text-muted link"><?php echo $r["asignatura"]; ?></p>
                </div>
             </div>
         </div>
</a>
        <?php endwhile;?>
      </table>



      </div>

    
                 <!-- /. ROW  -->
                <hr />     
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
  
  <?php include("../../includes/footer.php") ?>
   
</body>
</html>
