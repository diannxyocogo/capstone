<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include('config.php'); ?>
<?php
session_start();
	if(ISSET($_REQUEST['job_id'])){
		$id=$_REQUEST['job_id'];
        $app_id = ($_SESSION['app_id']);

        $que = "SELECT * FROM jobpost WHERE id='$id'";
        $result = $conn->query($que);
        $fetch = mysqli_fetch_array($result);

    $logo= $fetch['company_logo'];
	$bname= $fetch['company_name'];
	$cadd = $fetch['company_address'];
	$position = $fetch['job_position'];
	$description = $fetch['job_description'];
	$qualification = $fetch['job_qualification'];
	$salary = $fetch['job_salary'];
	$jtype = $fetch['job_type'];
	$kword1 = $fetch['keyword1'];
	$kword2 = $fetch['keyword2'];
	$kword3 = $fetch['keyword3'];
  $overview = $fetch['overview'];

    $sql = "INSERT INTO saved_jobs VALUES (NULL, '$logo', '$bname', '$cadd', '$position', '$description', '$qualification', '$salary', '$jtype', '$kword1', '$kword2', '$kword3', '$overview', '$app_id')";
    // insert in database 
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
        $(document).ready(function() {
          swal({
          title: 'Job saved successfully!',
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
            window.location.href = 'candidate-find-jobs-index.php';
          }
          });
        });
        </script>";
      } else {
        echo "<script type='text/javascript'>
        $(document).ready(function() {
          swal({
          title: 'Job not saved!',
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
            window.location.href = 'candidate-find-jobs-index.php';
          }
          });
        });
        </script>";
      }
    mysqli_close($conn);
    }
?>