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

              <?php 
          {
          $user_id=null;
          $sql1= "select * from secciones";
          $query = $con->query($sql1);
          }
      ?>


<hr>
  <H1>Reporte de Calificaciones</H1>
<hr>
      

      <?php while ($r=$query->fetch_array()):?>

<a href="concentrados_working.php?id=<?php echo $r["id"]; ?>">
                   <div class="col-md-3 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-wpforms"></i>
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
