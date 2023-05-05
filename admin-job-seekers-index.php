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
			<li >
				<a href="admin-companies-index.php">
                <i class='fas fa-user-tie'></i>
					<span class="text">Companies</span>
				</a>
			</li>
			<li class="active">
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
			<form action="admin-job-seekers-index.php" method="post">
				<div class="form-input">
					<input type="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search Applicant">
					<button type="submit" name="search-btn" class="search-btn"><i class='bx bx-search' ></i></button>
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
					<h1>Job Seekers</h1>
				</div>
			</div>

		
			<div class="cards detail">
                <div class="detail-header">
                    <h2>List of Job Seekers</h2>
                </div>

				<table>
                <tr>
                    <th>Applicant Name</th>
                    <th>Company Name</th>
                    <th>Job Positon</th>
                    <th>Application Status</th>
                    <th>Date Applied</th>
                </tr>

				<?php
		include('config.php');

		$query = "SELECT * FROM applicants";
		$result = $conn->query($query);
			
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			$que = $result->fetch_assoc();
			$query = "SELECT * FROM applicants WHERE CONCAT(company_name, job_position, applicant_name, applicant_status) LIKE '%$filtervalues%' ORDER BY id DESC";
			$search_result = filterTable($query);
			
		}
		 else {
			
				$que1 = $result->fetch_assoc();
				$query = "SELECT * FROM applicants";
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
	<tr>
                    <td><?php echo $row['applicant_name']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['job_position']; ?></td>
                    <td><?php echo $row['applicant_status']; ?></td>
					<td><?php echo $row['date_applied']; ?></td>

				
				</tr>
				<?php endwhile;?>
                
            </table>

               
    
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="admin-script.js"></script>
</body>
</html>