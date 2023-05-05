<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HireFolks</title>
   
  </head>
  <body>
    <div class="div1">
      <?php
      include 'db.php';

      $sql="SELECT applicant_resume from applicants";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="resume/<?php echo $info['applicant_resume'] ; ?>">
    <?php
      }

      ?>

    </div>

  </body>
</html>
