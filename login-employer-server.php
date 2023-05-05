<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include 'config.php'; ?>
<?php

	//This will receive information submitted from the login form and store (create) the information in the userAccount database. 
	//Used to track logged in users.
	session_start();

	$username = "";
	$email    = "";
	$errors = array(); 

	//Connecting to the userAccount database.
	$db = mysqli_connect('localhost', 'root', '', 'HireFolks');

	//For creating of users.
	if (isset($_POST['register'])) {
				
	// receive all input values from the form
		$em = mysqli_real_escape_string($db, $_POST['employer_email']);
		$bname = mysqli_real_escape_string($db, $_POST['employer_bname']);
		$password = mysqli_real_escape_string($db, $_POST['pass']);
		

	//To check if user does not already exist in the userAccount database with the same username and/or email.		
	$user_check_query = "SELECT * FROM employer_acc WHERE employer_email='$em' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
		if ($user) { 
			if ($user['employer_email'] === $em) {
				 array_push($errors, "Email already exists, please use other email.");
			}
		}

		$bname_check_query = "SELECT * FROM employer_acc WHERE employer_bname='$bname' LIMIT 1";
		$result1 = mysqli_query($db, $bname_check_query);
		$user1 = mysqli_fetch_assoc($result1);
			if ($user1) { 
				if ($user1['employer_bname'] === $bname) {
					 array_push($errors, "Business already exists, please use other business name.");
				}
			}

		$pdf= $_FILES['business_proof']['name'];
		$pdf_type= $_FILES['business_proof']['type'];
		$pdf_temp= $_FILES['business_proof']['tmp_name'];
		$pdf_store= "../admin/resume/".$pdf;
		

		//To create users if there are no errors.
		if (count($errors) == 0) {
			// $password = md5($password);//encrypt the password before saving in the database
			move_uploaded_file($pdf_temp, $pdf_store);
			$query = "INSERT INTO employer_acc VALUES(NULL, '', '$em', '$bname', 'Not Verified', '$password', '', '$pdf')";
			mysqli_query($db, $query);

			$query1 = "INSERT INTO companies VALUES(NULL, '$bname')";
			mysqli_query($db, $query1);
			echo "<script type='text/javascript'>
			$(document).ready(function() {
			   swal({
				 title: 'Account successfully created, please login!',
			   
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
					window.location.href = 'login-employer-index.php';
				 }
			   });
			});
		  </script>";	 
			 
		}
	}
	
	//For login of user.
		if (isset($_POST['login'])) {

			$email = mysqli_real_escape_string($db, $_POST['email']);
			$pas = mysqli_real_escape_string($db, $_POST['pword']);

		if (count($errors) == 0) {
			//$password = md5($pas);
			$query = "SELECT * FROM employer_acc WHERE employer_email='$email' AND pass='$pas' AND employer_status = 'Not Verified'";
			$results = mysqli_query($db, $query);

			$query1 = "SELECT * FROM employer_acc WHERE employer_email='$email' AND pass='$pas' AND employer_status = 'Verified'";
				 $results1 = mysqli_query($db, $query1);
				 
			if ($results->num_rows > 0) {
				 header('location: employer-dashboard-not-verified-index.php');
			}
				
			elseif($results1->num_rows > 0) {
				$row=mysqli_fetch_assoc($results1);
				
				$_SESSION['emp_id'] = $row['id'];
				header('location: employer-dashboard-index.php');
			} 
			else {
				array_push($errors, "Wrong Username and Password combination, please try again.");
			}
			
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title> Employer | HireFolks </title> 
	</head>
</html>