<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
			<li class="active">
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
			<form action="candidate-application-history-index.php" method="post">
				<div class="form-input">
				<input type="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search Application">
					<button type="submit" name="search-btn" class="search-btn"><i class='bx bx-search' ></i></button>
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
					<h1>Application History</h1>
				</div>
			</div>
			<div class="cards detail">
			<?php
		if(isset($_POST['search-btn']))
		{
			$app_id = $_SESSION['app_id'];
			$filtervalues = ($_POST['search']);
			
			$query = "SELECT * FROM applicants WHERE CONCAT(company_name, job_position, date_applied, applicant_status) LIKE '%$filtervalues%' AND applicant_id = '$app_id' ORDER BY id DESC";
			$search_result = filterTable($query);
		}
		 else {
			
			$query = "SELECT * FROM applicants WHERE applicant_id = '$app_id' ORDER BY id DESC";
			$search_result = filterTable($query);
		}
		
		// function to connect and execute the query
		function filterTable($query)
		{
			$connect = mysqli_connect("localhost", "root", "", "hirefolks");
			$filter_Result = mysqli_query($connect, $query);
			return $filter_Result;
		}
?>

		<?php while($row = mysqli_fetch_array($search_result)):?>
			<div class="card">
                    <!--<div class="logo-container">
                      <img src="./image/logo-salon.jpg" alt="Logo" class="logo">
                    </div> -->
                    <div class="card-content">
                      	<h2 class="card-title"><?php echo $row['company_name']; ?></h2>
                      <div class="card-info">
                        <p class="card-position"><i class="fa fa-briefcase"></i> <?php echo $row['job_position']; ?></p>
                        <p class="card-salary"><i class="fa fa-calendar"></i> <?php echo $row['date_applied']; ?></p>
                      </div>
                    </div>
                 

                  <div class="card-status">
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
                } ?> </div>

	
			</div>
			<?php endwhile;?>
			</div>
		
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../candidate-script.js"></script>
</body>
</html>