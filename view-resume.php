<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employer | HireFolks</title>
    <style media="screen">
      embed{
        border: 2px solid black;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <?php
      include 'config.php';
      if(ISSET($_REQUEST['app_id'])){
		$id=$_REQUEST['app_id'];

      $sql="SELECT applicant_resume from applicants where id = '$id'";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="../employer/resume/<?php echo $info['applicant_resume'] ; ?>" style="position:absolute; top:0; left:0; width:100%; height:100%; border: none; overflow: hidden;">
    <?php
      }
    }

      ?>

    </div>

  </body>
</html>
