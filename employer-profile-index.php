<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- My CSS -->
	<style>
  <?php include "employer-style.css" ?>
</style>

	<title>Employer | HireFolks</title>
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
				<a href="employer-dashboard-index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="employer-job-posting-index.php">
					<i class='bx bxs-briefcase'></i>
					<span class="text">Job Posting</span>
				</a>
			</li>
			<li>
				<a href="employer-screen-index.php">
					<i class='bx bx-search-alt-2'></i>
					<span class="text">Screening</span>
				</a>
			</li>
			<li>
				<a href="employer-interview-index.php">
					<i class='bx bxs-chat'></i>
					<span class="text">Interview</span>
				</a>
			</li>
			<li>
				<a href="employer-job-offer-index.php">
					<i class='bx bxs-user-badge'></i>
					<span class="text">Job Offer</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-user'></i>
					<span class="text">Profile</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
			<a href="login-employer-index.php" class="logout">
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
	$app_id = $_SESSION['emp_id'];

			$query = "SELECT * FROM employer_acc WHERE id = '$app_id'";
			$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
			<label for="email"><?php echo $row['employer_bname']?></label>
			</a>

			<a href="#" class="profile">
				
			<img src="../employer/image/<?php echo $row['employer_img']; ?>" alt="">
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
				
			</div>


			<div class="cards detail">
				<?php include 'config.php'; ?>
			<?php
	
	$emp_id = $_SESSION['emp_id'];

			$query = "SELECT * FROM employer_acc WHERE id = '$emp_id'";
			$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
		<form action="employer-profile-index.php" method="post" autocomplete="off" enctype="multipart/form-data">
		
				<div class="box">
                        <img src="../employer/image/<?php echo $row['employer_img']; ?>" alt="" id="output">
						
						<script> //To display preview image
                        var loadFile = function(event) {
                          var image = document.getElementById('output');
                          image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>

</div>
                       <label for="profile-picture-upload">Company Logo</label>
						<input type="file" id="profile-picture-upload" name="profile-picture-upload" onchange="loadFile(event)">
       		 
				
			
			<input type="hidden" name="app_id" value="<?php echo $row['id']?>">
			
			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="text" id="email" name="email" class="email" placeholder="Enter your email address" value="<?php echo $row['employer_email']?>">
			</div>
			<div class="form-group">
				<label for="email">Company's Overview</label>
				<textarea id="overview" name="overview"><?php echo $row['overview']?></textarea>
				
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
	

	<script src="./employer-script.js"></script>
</body>
</html>
<?php
if(isset($_POST["update"])){
	include('config.php');		

    $img= $_FILES['profile-picture-upload']['name'];
		$tempname= $_FILES['profile-picture-upload']['tmp_name'];
		$folder= "../employer/image/".$img;

	$id= ($_POST['app_id']);
	$email = ($_POST['email']);
	$overview = ($_POST['overview']);
	$old = ($_POST['current-password']);
	$new_password = ($_POST['new-password']);
	$confirm_password = ($_POST['confirm-password']);


			$query = "SELECT * FROM employer_acc WHERE id = '$id'";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
			$old_password = $row['pass'];


			if($old == $old_password){
				if($new_password == $confirm_password){
					if(!empty($row['employer_img'])){
						
						$query1 = "UPDATE employer_acc SET employer_email = '$email', pass = '$new_password', overview = '$overview' WHERE id = '$id'";
						$query_run = $conn->query($query1);

						if($query_run){
							echo "<script type='text/javascript'>
							$(document).ready(function() {
							   swal({
								 title: 'Details successfully edited!',
							   
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
									window.location.href = 'employer-profile-index.php';
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
									window.location.href = 'employer-profile-index.php';
								 }
							   });
							});
						  </script>";
						}
	
					}else{
							$q = "UPDATE employer_acc SET employer_img = '$img', employer_email = '$email', pass = '$new_password', overview = '$overview' WHERE id = '$id'";
							$q_run = $conn->query($q);
							move_uploaded_file($tempname, $folder);

							if($q_run){
								echo "<script type='text/javascript'>
								$(document).ready(function() {
								   swal({
									 title: 'Details successfully edited!',
								   
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
										window.location.href = 'employer-profile-index.php';
									 }
								   });
								});
							  </script>";
							} else{
								echo "<script type='text/javascript'>
								$(document).ready(function() {
								   swal({
									 title: 'Errorrr in updating your details!',
									
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
										window.location.href = 'employer-profile-index.php';
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
						window.location.href = 'employer-profile-index.php';
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
										window.location.href = 'employer-profile-index.php';
									 }
								   });
								});
							  </script>";
		}
	}
?>
		
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