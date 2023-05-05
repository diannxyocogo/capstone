<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<!-- My CSS -->
	<style>
  <?php include "candidate-style.css" ?>

</style>

	<title>Applicant | HireFolks</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">

<!-- CHANGE PASSWORD -->
<div id="password-myModal" class="password-modal">
<div class="password-modal-content">

		</div>
		
		</div>


		<a href="#" class="brand">
			<div class="logo-image">
                <img src="./image/logo.png" alt="">
            </div>
			<span class="text">HireFolks</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="candidate-dashboard-index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="candidate-find-jobs-index.php">
					<i class='bx bxs-briefcase'></i>
					<span class="text">Find Jobs</span>
				</a>
			</li>
			<li>
				<a href="candidate-saved-jobs-index.php">
					<i class='bx bxs-check-square'></i>
					<span class="text">Saved Jobs</span>
				</a>
			</li>
			<li>
				<a href="candidate-application-history-index.php">
					<i class='bx bx-history'></i>
					<span class="text">Application History</span>
				</a>
			</li>
			<li class="active">
				<a href="candidate-profile-index.php">
					<i class='bx bxs-user'></i>
					<span class="text">Profile</span>
				</a>
			</li>
		
		
		<ul class="side-menu">
			<li>
				<a href="login-candidate-index.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="hidden" placeholder="Search...">
					
				</div>
			</form>
			<?php include 'config.php'; ?>
			<?php
			session_start();
	$app_id = $_SESSION['app_id'];

			$query = "SELECT * FROM applicants_acc WHERE id = '$app_id'";
			$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
			<label for="email"><?php echo $row['applicant_name']?></label>
			</a>

			<a href="#" class="profile">
				
			<img src="../candidate/image/<?php echo $row['applicant_img']; ?>" alt="">
			</a>
			<?php
            }

        } 
        else{
            echo "";
		}
	
        ?>
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Profile</h1>
				</div>
				<a href ="resume.html"><button class="create-resume">Create Resume</button></a>
</div>


			<div class="cards detail">
			<?php include 'config.php'; ?>
			<?php
			
	$app_id = $_SESSION['app_id'];

			$query = "SELECT * FROM applicants_acc WHERE id = '$app_id'";
			$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
		<form action="candidate-profile-index.php" method="post" autocomplete="off" enctype="multipart/form-data">
	
                    <div class="box">
                        <img src="../candidate/image/<?php echo $row['applicant_img']; ?>" alt="" id="output">
						<script> //To display preview image
                        var loadFile = function(event) {
                          var image = document.getElementById('output');
                          image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>
                        <label for="profile-picture-upload" class="upload-btn">Upload Picture</label>
						<input type="file" id="profile-picture-upload" name="profile-picture-upload" onchange="loadFile(event)">
                    </div>
	
			
			<input type="hidden" name="app_id" value="<?php echo $row['id']?>"/>
			<div class="form-group">
				<label for="full-name">Full Name</label>
				<input type="text" id="full-name" name="full-name" placeholder="Enter your full name" value="<?php echo $row['applicant_name']?>">
			</div>
			<div class="form-group">
				<label for="age">Age</label>
				<input type="number" id="age" name="age" placeholder="Enter your age" value="<?php echo $row['applicant_age']?>">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" id="address" name="address" placeholder="Enter your address" value="<?php echo $row['applicant_address']?>">
			</div>
			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="email" id="email" name="email" placeholder="Enter your email address" value="<?php echo $row['applicant_email']?>">
			</div>
			<div class="form-group">
				<label for="contact-number">Contact Number</label>
				<input type="tel" id="contact-number" name="contact-number" placeholder="Enter your contact number" value="<?php echo $row['applicant_contact']?>">
			</div>
			
			<h1> Change Password </h1>
			<div class="form-group">
				<label for="input1">Current Password</label>
     			<input style="width: 100%;" type="password" id="current-password" name="current-password" value="<?php echo $row['pass']?>" placeholder="Enter current password...">
			</div>
			<div class="form-group">
				<label for="input1">New Password</label>
     			<input style="width: 100%;" type="password" id="new-password" name="new-password" value="<?php echo $row['pass']?>" placeholder="Enter new password...">
			</div>
			<div class="form-group">
				<label for="input1">Confirm Password</label>
     			<input style="width: 100%;" type="password" id="confirm-password" name="confirm-password" value="<?php echo $row['pass']?>" placeholder="Confirm password...">
			</div>

			<input type="checkbox" onclick="myFunction()"> Show Password

			<div class="button-group">
				<button type="submit" class="profile-update-btn" name="update">Update</button>
				<button class="profile-update-btn" name="cancel" href="candidate-profile-index.php">Cancel</button>
			</div>
		</form>



		<?php
            }

        } 
        else{
            echo "No Data Found";
		}
	
        ?>
	</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="candidate-script.js"></script>
	
</body>
</html>

<?php
if(isset($_POST["update"])){
	include('config.php');		

	$img= $_FILES['profile-picture-upload']['name'];
		$tempname= $_FILES['profile-picture-upload']['tmp_name'];
		$folder= "../candidate/image/".$img;


	$id= ($_POST['app_id']);
	$name= ($_POST['full-name']);
	$age = ($_POST['age']);
	$add = ($_POST['address']);
	$email = ($_POST['email']);
	$contact = ($_POST['contact-number']);
	$old = ($_POST['current-password']);
	$new_password = ($_POST['new-password']);
	$confirm_password = ($_POST['confirm-password']);


	$query = "SELECT * FROM applicants_acc WHERE id = '$id'";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
			$old_password = $row['pass'];
			

			if($old == $old_password){
				if($new_password == $confirm_password){
					if(!empty($row['applicant_img'])){
						
						$query1 = "UPDATE applicants_acc SET applicant_name = '$name', applicant_age = '$age', applicant_address = '$add', applicant_contact = '$contact', applicant_email = '$email', pass = '$new_password' WHERE id = '$id'";
						$query_run = $conn->query($query1);

						if($query_run){
							echo "<script type='text/javascript'>
							$(document).ready(function() {
							  swal({
								title: 'Details updated successfully!',
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
								  window.location.href = 'candidate-profile-index.php';
								}
							  });
							});
						  </script>";
						} else{
							echo "<script type='text/javascript'>
							$(document).ready(function() {
							  swal({
								title: 'Error in updating your details!',
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
								  window.location.href = 'candidate-profile-index.php';
								}
							  });
							});
						  </script>";
						}
	
					}else{
							$q = "UPDATE applicants_acc SET applicant_img = '$img', applicant_name = '$name', applicant_age = '$age', applicant_address = '$add', applicant_contact = '$contact', applicant_email = '$email', pass = '$new_password' WHERE id = '$id'";
							$q_run = $conn->query($q);
							move_uploaded_file($tempname, $folder);

							if($q_run){
								echo "<script type='text/javascript'>
								$(document).ready(function() {
								  swal({
									title: 'Details updated successfully!',
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
									  window.location.href = 'candidate-profile-index.php';
									}
								  });
								});
							  </script>";
							} else{
								echo "<script type='text/javascript'>
								$(document).ready(function() {
								  swal({
									title: 'Error in updating your details!',
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
									  window.location.href = 'candidate-profile-index.php';
									}
								  });
								});
							  </script>";
							}
					}
			}else{
				echo "<script type='text/javascript'>
				$(document).ready(function() {
				   swal({
					 title: 'New Password & Confirm Password does not match!',
					
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
						window.location.href = 'candidate-profile-index.php';
					 }
				   });
				});
			  </script>";
			}
		}else{
			echo "<script type='text/javascript'>
								$(document).ready(function() {
								   swal({
									 title: 'Current Password is incorrect!',
									
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
										window.location.href = 'candidate-profile-index.php';
									 }
								   });
								});
							  </script>";
		}
}
?>

<script type='text/javascript'>
             $(document).ready(function(){
                $('.change-password').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'change-password.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.password-modal-content').html(response); 
                            $('#password-myModal').modal('show'); 
                        }
                    });
                });
            });
			</script>

<script>
	function myFunction() {
  var x = document.getElementById("current-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }


  var y = document.getElementById("new-password");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }


  var z = document.getElementById("confirm-password");
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
}
</script>