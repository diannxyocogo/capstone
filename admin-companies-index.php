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
			<li class="active">
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
			<form action="admin-companies-index.php" method="post">
				<div class="form-input">
					<input type="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search Company">
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
					<h1>Companies</h1>
				</div>
			</div>

		
			<div class="cards detail">
                <div class="detail-header">
                    <h2>Company Details</h2>
                </div>

				<table>
                <tr>
                    <th>Company Name</th>
                    <th>Employers' Email</th>
					<th>Account Status</th>
                    <th>Business Permit</th>
					<th></th>
					<th>Job Offered</th>
					
                </tr>
				<?php
		include('config.php');

		$query = "SELECT * FROM employer_acc";
		$result = $conn->query($query);
			
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			$que = $result->fetch_assoc();
			$query = "SELECT * FROM employer_acc WHERE CONCAT(employer_email, employer_bname, employer_status) LIKE '%$filtervalues%' AND employer_status = '$que[employer_status]' ORDER BY id DESC";
			$search_result = filterTable($query);
			
		}
		 else {
			
				$que1 = $result->fetch_assoc();
				$query = "SELECT * FROM employer_acc";
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
                    <td><?php echo $row['employer_bname']; ?></td>
                    <td><?php echo $row['employer_email']; ?></td>
					<td><?php echo $row['employer_status']; ?></td>
					<td><button class="suitable"><a href="view-permit.php?app_id=<?php echo $row['id']?>">View Permit</a></button></td>
					<td><button class="suitable"><a href="verify.php?emp_id=<?php echo $row['id']?>">Verify</a></button></td>
                    
					<td>
						<?php 
							include "config.php";
						
							$sql = "SELECT employer_bname FROM employer_acc WHERE employer_email = '{$row['employer_email']}'";
							$query = mysqli_query($conn, $sql);

							if ($query->num_rows > 0) {
								$que1 = $query->fetch_assoc();
								$query2 = "SELECT * FROM applicants WHERE company_name = '$que1[employer_bname]' AND applicant_status = 'Hired'";
								$result2 = $conn->query($query2);

							if($result2){
								$row = mysqli_num_rows($result2);
								echo "$row";
	
								} else {
									echo "0";
								}
							}
						?>
					</td>
					
                </tr> 
<?php endwhile;?>

            </table>
</div>

               
    
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="admin-script.js"></script>
</body>
</html>