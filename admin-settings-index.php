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
  <?php include "admin-style.css" ?>
</style>

	<title>Admin | HireFolks</title>
</head>
<body >


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<div class="logo-image">
                <img src="image/logo.png" alt="">
            </div>
			<span class="text">HireFolks</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="admin-dashboard-index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admin-companies-index.php">
                <i class='fas fa-user-tie'></i>
					<span class="text">Companies</span>
				</a>
			</li>
			<li>
				<a href="admin-job-seekers-index.php">
                <i class='fas fa-users'></i>
					<span class="text">Job Seekers</span>
				</a>
			</li>
			<li>
				<a href="admin-faqs-index.php">
                <i class='bx bxs-envelope' ></i>
					<span class="text">FAQ's</span>
				</a>
			</li>
			<li class="active">
				<a href="admin-settings-index.php">
                <i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>

		<ul class="side-menu">
			<li>
				<a href="admin-login-index.php" class="logout">
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

			<label for="name">Admin</label>


			<a href="#" class="profile">
				<img src="image/employer.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Settings</h1>
				</div>
				
			</div>

		
			<div class="cards detail">
              
				<?php include 'config.php'; ?>
			<?php

			$query = "SELECT * FROM admin_acc";
			$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
		<form action="admin-settings-index.php" method="post" autocomplete="off" enctype="multipart/form-data">
		
			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="text" id="email" name="email" class="email" placeholder="Enter your email address" value="<?php echo $row['admin_email']?>">
			</div>


				<h2>Change Password</h2>
  <label class="quest" for="quest">Current Password</label>
  <input style="width: 100%;" type="password" id="current-password" name="current-password" value="<?php echo $row['pass']?>" placeholder="Enter current password...">

  <label class="ans" for="ans">New Password</label>
  <input style="width: 100%;" type="password" id="new-password" name="new-password" value="<?php echo $row['pass']?>" placeholder="Enter new password...">

  <label class="con" for="ans">Confirm Password</label>
  <input style="width: 100%;" type="password" id="confirm-password" name="confirm-password" value="<?php echo $row['pass']?>" placeholder="Confirm new password...">
  <input type="checkbox" onclick="myFunction()"> Show Password

  <div class="button-group">
				<button type="submit" class="profile-update-btn" name="update">Update</button>
				<button class="profile-update-btn" name="cancel" href="admin-settings-index.php">Cancel</button>
			</div>
</form>


</div>
<?php
	}
}
?>

               
    
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="admin-script.js"></script>
</body>
</html>

<?php
if(isset($_POST["update"])){
	include('config.php');		

	$email = ($_POST['email']);
	$current_password = ($_POST['current-password']);
	$new_password = ($_POST['new-password']);
	$confirm_password = ($_POST['confirm-password']);

	$query = "SELECT * FROM admin_acc WHERE admin_email = '$email' AND pass = '$current_password'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$old_password = $row['pass'];

	if($current_password == $old_password){
		if($new_password == $confirm_password){
			$query = "UPDATE admin_acc SET pass = '$new_password' WHERE admin_email = '$email'";
			$result = $conn->query($query);
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
					window.location.href = 'admin-settings-index.php';
				 }
			   });
			});
		  </script>";
		}else{
			echo "<script type='text/javascript'>
			$(document).ready(function() {
			   swal({
				 title: 'Password does not match!',
				
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
					window.location.href = 'admin-settings-index.php';
				 }
			   });
			});
		  </script>";
		}
	}else{
		echo "<script type='text/javascript'>
		$(document).ready(function() {
		   swal({
			 title: 'Password does not match!',
			
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
				window.location.href = 'admin-settings-index.php';
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