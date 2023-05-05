
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
  <?php include "employer-style.css" ?>
</style>

	<title>Employer | HireFolks</title>
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
			<li>
				<a href="employer-profile-index.php">
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
	$emp_id = $_SESSION['emp_id'];

			$query = "SELECT * FROM employer_acc WHERE id = '$emp_id'";
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
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				
				<li>
					<i class='bx bx-search-alt-2'></i>
					<span class="text">
					<?php include('config.php'); ?>
					<?php 
					
					$emp = ($_SESSION['emp_id']);

					$query = "SELECT business_name FROM companies WHERE id = '$emp'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						$que = $result->fetch_assoc();
						$query1 = "SELECT * FROM applicants WHERE company_name = '$que[business_name]' AND applicant_status = 'Screening'";
						$result1 = $conn->query($query1);

						if($result1){
							$row = mysqli_num_rows($result1);
							echo "<h3>$row</h3>";
							echo "<p>Screening</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>No Applicants</p>";
						}
					}
						?>
					</span>
				</li>
				<li>
					<i class='bx bxs-chat'></i>
					<span class="text">
					<?php include('config.php'); ?>
					<?php 
					
					$emp = ($_SESSION['emp_id']);

					$query = "SELECT business_name FROM companies WHERE id = '$emp'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						$que = $result->fetch_assoc();
						$query1 = "SELECT * FROM applicants WHERE company_name = '$que[business_name]' AND applicant_status = 'Interview'";
						$result1 = $conn->query($query1);

						if($result1){
							$row = mysqli_num_rows($result1);
							echo "<h3>$row</h3>";
							echo "<p>Interview</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>No Applicants</p>";
						}
					}
						?>
					</span>
				</li>
                <li>
					<i class='bx bxs-user-badge'></i>
					<span class="text">
					<?php include('config.php'); ?>
					<?php 
				
					$emp = ($_SESSION['emp_id']);

					$query = "SELECT business_name FROM companies WHERE id = '$emp'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						$que = $result->fetch_assoc();
						$query1 = "SELECT * FROM applicants WHERE company_name = '$que[business_name]' AND applicant_status = 'Hired'";
						$result1 = $conn->query($query1);

						if($result1){
							$row = mysqli_num_rows($result1);
							echo "<h3>$row</h3>";
							echo "<p>Job Offer</p>";
						} else {
							echo "<h3>0</h3>";
							echo "<p>No Applicants</p>";
						}
					}
						?>
					</span>
				</li>
			</ul>


			<div class="cards detail">
                <div class="detail-header">
                    <h2>List of Applicants</h2>
                </div>
                <table>
                    <tr>
                        <th>Applicant Name</th>
                        <th>Status</th>
                        <th>Date Applied</th>
                    </tr>
					<?php include "config.php"; ?>
				<?php 
				$emp = ($_SESSION['emp_id']);

				$query = "SELECT business_name FROM companies WHERE id = '$emp'";
				$result = $conn->query($query);
	   
			if ($result->num_rows > 0) {
				$que = $result->fetch_assoc();
				$query1 = "SELECT * FROM applicants WHERE company_name = '$que[business_name]'";
				$result1 = $conn->query($query1);
				while($row = $result1->fetch_assoc()) {
					?>
                    <tr>
                        <td><?php echo $row['applicant_name']; ?></td>
						<td>
						<?php
				if($row['applicant_status'] == 'Screening'){
					echo '<span class="status onprogress"><i class="fa fa-circle"></i> Screening</span>';
				}
				elseif ($row['applicant_status'] == 'Not Suitable'){
					echo '<span class="status declined"><i class="fa fa-circle"></i> Not Suitable</span>';
				} 
				elseif ($row['applicant_status'] == 'Interview'){
					echo '<span class="status interview"><i class="fa fa-circle"></i> Interview</span>';
				} 
				else{
					echo '<span class="status fulfilled"><i class="fa fa-circle"></i> Hired</span>';
				}
				?>
						</td>
                        <td><?php echo $row['date_applied']; ?></td>
                    </tr>
                    <?php 
					}
				} else {
					
					echo "No Applicants";
				}
				?>
                </table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="employer-script.js"></script>
</body>
</html>