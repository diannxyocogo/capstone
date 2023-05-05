<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(ISSET($_POST['apply'])){
    include 'config.php';

    session_start();
    $app_id = ($_SESSION['app_id']);
  $resume = $_FILES["resume"]["name"];
  $tempname = $_FILES["resume"]["tmp_name"];
  $folder = "../employer/resume/".$resume;

  $date=date('Y-m-d');
  $bname= ($_POST['company_name']);
  $position = ($_POST['job_position']);
  $name= ($_POST['full-name']);
  $age = ($_POST['age']);
  $add = ($_POST['address']);
  $number = ($_POST['contact-num']);
  $email = ($_POST['email']);
  $experience = ($_POST['experience']);
  $status = "Screening";
  $email_notif = "Not yet";
  $sms = "Not yet";

  $sql="INSERT INTO applicants VALUES (NULL, '$bname', '$position', '$name', '$age', '$add', '$number', '$email', '$resume', '$experience', '$status', 'Not Set', 'Not Set', 'Not Set', '$date', 'Not Set', 'Not Set', '$app_id')";
  mysqli_query($conn, $sql);
// insert in database 
if (move_uploaded_file($tempname, $folder)) {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
	swal({
	  title: 'Application submitted successfully!',
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
		window.location.href = 'candidate-saved-jobs-index.php';
	  }
	});
  });
</script>";
} else {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
	swal({
	  title: 'Error in submitting your application!',
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
		window.location.href = 'candidate-saved-jobs-index.php';
	  }
	});
  });
</script>";
}
mysqli_close($conn);
}
?>





