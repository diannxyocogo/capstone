<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- My CSS -->
    <style>
  <?php include "candidate-style.css" ?>
</style>

	<title>Applicant | HireFolks</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<div class="logo-image">
                <img src="./image/logo.png" alt="">
            </div>
			<span class="text">HireFolks</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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
			<li>
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
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-check-square'></i>
					<span class="text">
					<?php 
						include "config.php";
						
						$app_id = $_SESSION['app_id'];
						$sql = "SELECT * FROM applicants WHERE applicant_id = '$app_id'";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Applied Jobs</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>Applied Jobs</p>";
						}
						?>
					</span>
				</li>
				<?php
				include "config.php"; ?>
				<li>
					<i class='bx bx-search-alt-2'></i>
					<span class="text">
						<?php 
						
						$app_id = $_SESSION['app_id'];
						$sql = "SELECT * FROM saved_jobs WHERE applicant_id = '$app_id'";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Saved Jobs</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<pSaved Jobs</p>";
						}
						?>
					</span>
				</li>
                <li>
					<i class='bx bxs-user-badge'></i>
					<span class="text">
					<?php 
						
						$app_id = $_SESSION['app_id'];
						$sql = "SELECT * FROM applicants WHERE applicant_id = '$app_id' AND applicant_status = 'Hired'";
						$query = mysqli_query($conn, $sql);

						if($query){
							$row = mysqli_num_rows($query);
							echo "<h3>$row</h3>";
							echo "<p>Job Offer</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<pJob Offer</p>";
						}
						?>
					</span>
				</li>
			</ul>


			<div class="cards detail">
                <div class="detail-header">
                    <h2>List of Companies</h2>
                </div>
                <table>
                    <tr>
                        <th>Company Name</th>
						<th>Job Position</th>
                        <th>Date Applied</th>
                    </tr>
					<?php
		include('config.php');
		$applicant_id = $_SESSION['app_id'];

		$query = "SELECT * FROM applicants WHERE applicant_id = '$applicant_id'";
		$result = $conn->query($query);
   
		if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['company_name']; ?></td>
						<td><?php echo $row['job_position']; ?></td>
                        <td><?php echo $row['date_applied']; ?></td>
                    </tr>
                    <?php
            }

        } 

        else{

            echo "No Application History";
		}
        ?>
                </table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="./candidate-script.js"></script>
</body>
</html>