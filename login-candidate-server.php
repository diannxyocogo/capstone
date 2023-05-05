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
	$name = mysqli_real_escape_string($db, $_POST['candidate_name']);
	$age = mysqli_real_escape_string($db, $_POST['candidate_age']);
	$address = mysqli_real_escape_string($db, $_POST['candidate_address']);
	$contact = mysqli_real_escape_string($db, $_POST['candidate_contact']);
	$em = mysqli_real_escape_string($db, $_POST['candidate_email']);
	$password = mysqli_real_escape_string($db, $_POST['pass']);

		

	//To check if user does not already exist in the userAccount database with the same username and/or email.		
	$user_check_query = "SELECT * FROM applicants_acc WHERE applicant_email='$em' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
		if ($user) { 
			if ($user['applicant_email'] === $em) {
				 array_push($errors, "Email already exists, please use other email.");
			}
		}


		//To create users if there are no errors.
		if (count($errors) == 0) {
			//$password = md5($password);//encrypt the password before saving in the database
			
			$query = "INSERT INTO applicants_acc VALUES(NULL, '', '$name', '$age', '$address', '$contact', '$em', '$password')";
			mysqli_query($db, $query);
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
					window.location.href = 'login-candidate-index.php';
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
			$query = "SELECT * FROM applicants_acc WHERE applicant_email='$email' AND pass='$pas'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				$row=mysqli_fetch_assoc($results);
				
				$_SESSION['app_id'] = $row['id'];
				header('location: candidate-dashboard-index.php');
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
		<title> Applicant | HireFolks </title> 
	</head>
</html>