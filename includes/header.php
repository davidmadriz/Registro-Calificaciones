  <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-size: 24px;" href="../../index.php">Educación Especial</a> 
            </div>


             <?php 
          {
          $user_id=null;
          $sql1= "select * from config_inst";
          $query = $con->query($sql1);


          }
      ?>
        
      <?php while ($r=$query->fetch_array()):?>
  <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                    Licenciado(a): <?php echo $r["profesor"]; ?> &nbsp; 
        <?php endwhile ?>
                   
            <a href="#" class="btn btn-danger square-btn-adjust">Manual de Usuario</a> 
  </div>
   
  <?php include("../../includes/menu.php") ?>

        <div id="page-wrapper" >
            <div id="page-inner">