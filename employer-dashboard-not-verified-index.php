
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
		
        <!-- Verification Modal -->
        <div id="delete-modalContainer" class="logout-modal-container">
  <!-- Modal Content -->
  <div class="logout-modal-content">
  <form action="login-employer-index.php" method="post" autocomplete="off" enctype="multipart/form-data">
	<h2 class="logout-modal-title">Your account has not been verified yet</h2>
	<p>Please wait for 1 to 2 business days</p>
	<!-- Modal Buttons -->
	<div class="logout-modal-buttons">
		<button type="submit" name="logout" class="logout-modal-button modal-button-logout">Logout</button>
	</div>
	</form>

  </div>
</div>


        
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
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>

			<i class='bx bx-moon'></i>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>

			<a href="#" class="profile">
				<img src="./image/employer.jpg">
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
					<i class='bx bx-search-alt-2'></i>
					<span class="text">
					<h3>0</h3>
					<p>Screening</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-chat'></i>
					<span class="text">
					<h3>0</h3>
					<p>Interview</p>
					</span>
				</li>
                <li>
					<i class='bx bxs-user-badge'></i>
					<span class="text">
					<h3>0</h3>
					<p>Job Offer</p>
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
