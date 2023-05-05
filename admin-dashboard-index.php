<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


	<!-- My CSS -->
	<style>
  <?php include "admin-style.css" ?>
</style>

	<title>Admin | HireFolks</title>
</head>
<body >


	<!-- SIDEBAR -->
	<section id="sidebar">

	<!-- DISPLAY JOB DETAILS -->
	<div class="modal-container" id="myModal">
	
	<div class="modal-content">
   
	</div>
</div>

		<a href="#" class="brand">
			<div class="logo-image">
                <img src="image/logo.png" alt="">
            </div>
			<span class="text">HireFolks</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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
			<li>
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
					<h1>Dashboard</h1>
				</div>
               
			</div>

			<ul class="box-info">
				
				<li>
					<i class='fas fa-users'></i>
					<span class="text">
					<?php 
						include "config.php";
						
						$sql = "SELECT * FROM applicants";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Job Seekers</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>Job Seekers</p>";
						}
						?>
					</span>
				</li>
				<li>
					<i class='fas fa-user-tie'></i>
					<span class="text">
					<?php 
						include "config.php";
						
						$sql = "SELECT * FROM employer_acc";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Employers</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>Employers</p>";
						}
						?>
					</span>
				</li>
                <li>
					<i class='fas fa-briefcase'></i>
					<span class="text">
					<?php 
						include "config.php";
						
						$sql = "SELECT * FROM jobpost WHERE jobpost_status = 'Posted'";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Job Posted</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>Job Posted</p>";
						}
						?>
					</span>
				</li>
				<li>
					<i class='fas fa-handshake'></i>
					<span class="text">
					<?php 
						include "config.php";
						
						$sql = "SELECT * FROM applicants WHERE applicant_status = 'Hired'";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Job Offer</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>Job Offer</p>";
						}
						?>
					</span>
				</li>
			</ul>

			<div class="cards detail">
                <div class="detail-header">
                    <h2>Job Posting Under Review</h2>
                </div>

				<?php
		include('config.php');

			$query = "SELECT * FROM jobpost ORDER BY id DESC";
			$result = $conn->query($query);
   
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				?>
				<div class="card">
					<div class="card-container" data-id='<?php echo $row['id']; ?>' onclick="document.getElementById('myModal').style.display='block'">
						<div class="logo-container">
							<img src="../employer/image/<?php echo $row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" class="logo">
						</div>
							<div class="card-content">
									  <h2 class="card-title" id="company_name"><?php echo $row['company_name']; ?></h2>
								  <div class="card-info">
										<p class="card-position"><i class="fa fa-briefcase"></i><?php echo $row['job_position']; ?></p>
										<p class="card-salary"><i class="fas fa-money-bill-wave"></i> ₱<?php echo $row['job_salary']; ?> per month</p>
										<p class="card-address"><i class="fas fa-map-marker-alt"></i><?php echo $row['company_address']; ?></p>
								 </div>
						  </div>
				 </div>
	
				 <div class="card-status">
				<?php
				if($row['jobpost_status'] == 'Reviewing'){
					echo '<span class="status onprogress"><i class="fa fa-circle"></i> Reviewing</span>';
				}
				elseif ($row['jobpost_status'] == 'Declined'){
					echo '<span class="status declined"><i class="fa fa-circle"></i> Declined</span>';
				} 
				else{
					echo '<span class="status fulfilled"><i class="fa fa-circle"></i> Posted</span>';
				}
				?>
				
    </div>
						<div class="card-buttons">
							<a href="accept-jobpost.php?job_id=<?php echo $row['id']?>"><button class="post" id="post">Post</button></a>
							<a href="declined-jobpost.php?job_id=<?php echo $row['id']?>"><button class="decline" id="post">Decline</button></a>
						</div>

				</div>
						<?php
				}

     		
		}

        else{
			echo "No Job Post";
			
		}
        ?>

			</div>
     <script src="admin-script.js"></script>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</body>
</html>
<script type='text/javascript'>
             $(document).ready(function(){
                $('.card-container').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'review-jobpost-ajax.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-content').html(response); 
                            $('#myModal').modal('show'); 
                        }
                    });
                });
            });

            </script>
			<script>
/// Get the modal container
var modalContainer = document.querySelector('.modal-container');
// Get the close button
var closeButton = document.querySelector('.close');

// When the user clicks the close button, hide the modal
closeButton.addEventListener('click', function() {
  modalContainer.style.display = 'none';
});

// When the user clicks anywhere outside of the modal content, hide the modal
window.addEventListener('click', function(event) {
  if (event.target == modalContainer) {
    modalContainer.style.display = 'none';
  }
});

</script>

