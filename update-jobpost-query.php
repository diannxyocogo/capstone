<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(ISSET($_POST['update'])){
    include 'config.php';
  $logo = $_FILES["company_logo"]["name"];
  $tempname = $_FILES["company_logo"]["tmp_name"];
  $folder = "../employer/image/".$logo;

    $userid = ($_POST['user_id']);
  $bname= ($_POST['company_name']);
  $cadd = ($_POST['company_add']);
  $position = ($_POST['job_position']);
  $description = ($_POST['job_description']);
  $qualification = ($_POST['job_qualification']);
  $salary = ($_POST['job_salary']);
  $jtype = ($_POST['jtype']);
  $kword1 = ($_POST['keyword1']);
  $kword2 = ($_POST['keyword2']);
  $kword3 = ($_POST['keyword3']);

  $sq = "SELECT company_logo FROM jobpost WHERE id = '$userid'";
  $resul = mysqli_query($conn,$sq);
  $row = $resul->fetch_assoc();

  if(!empty($row['company_logo'])){
        $sql="UPDATE jobpost SET id = '$userid', 
                        
                        company_name = '$bname', 
                        company_address = '$cadd', 
                        job_position = '$position', 
                        job_description = '$description', 
                        job_qualification = '$qualification', 
                        job_salary = '$salary', 
                        job_type = '$jtype', 
                        keyword1 = '$kword1', 
                        keyword2 = '$kword2', 
                        keyword3 = '$kword3' 
                        WHERE id = '$userid'";
  $query_run = $conn->query($sql);
// insert in database 
        if($query_run){
             echo "<script type='text/javascript'>
             $(document).ready(function() {
                swal({
                  title: 'Job Post successfully edited!',
                
                  icon: 'success',
                  buttons: {
                     ok: {
                       text: 'Ok',
                       value: 'ok',
                       className: 'my-ok-btn'
                     }
                  },
                 
                }).then((value) => {
                  if (value === 'ok') {
                     window.location.href = 'employer-job-posting-index.php';
                  }
                });
             });
           </script>";
        } else{
             echo "<script type='text/javascript'>
             $(document).ready(function() {
                swal({
                  title: 'An error occured while posting your job!',
                 
                  icon: 'error',
                  buttons: {
                     ok: {
                       text: 'Ok',
                       value: 'ok',
                       className: 'my-ok-btn'
                     }
                  },
                 
                }).then((value) => {
                  if (value === 'ok') {
                     window.location.href = 'employer-job-posting-index.php';
                  }
                });
             });
           </script>";
        }
  } else{
    $sql="UPDATE jobpost SET id = '$userid', 
                        company_logo = '$logo', 
                        company_name = '$bname', 
                        company_address = '$cadd', 
                        job_position = '$position', 
                        job_description = '$description', 
                        job_qualification = '$qualification', 
                        job_salary = '$salary', 
                        job_type = '$jtype', 
                        keyword1 = '$kword1', 
                        keyword2 = '$kword2', 
                        keyword3 = '$kword3', 
                        company_logo = '$logo' 
                        WHERE id = '$userid'";
$q_run = $conn->query($sql);
move_uploaded_file($tempname, $folder);
// insert in database 
        if($q_run){
             echo "<script type='text/javascript'>
             $(document).ready(function() {
                swal({
                  title: 'Job Posted!',
                 
                  icon: 'success',
                  buttons: {
                     ok: {
                       text: 'Ok',
                       value: 'ok',
                       className: 'my-ok-btn'
                     }
                  },
                 
                }).then((value) => {
                  if (value === 'ok') {
                     window.location.href = 'employer-job-posting-index.php';
                  }
                });
             });
           </script>";
        } else{
          echo "<script type='text/javascript'>
          $(document).ready(function() {
             swal({
               title: 'Job Not Posted!',
              
               icon: 'error',
               buttons: {
                  ok: {
                    text: 'Ok',
                    value: 'ok',
                    className: 'my-ok-btn'
                  }
               },
              
             }).then((value) => {
               if (value === 'ok') {
                  window.location.href = 'employer-job-posting-index.php';
               }
             });
          });
        </script>";
        }
  }
}
?>