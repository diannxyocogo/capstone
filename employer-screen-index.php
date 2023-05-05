<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- My CSS -->
	<style  media="screen">
  <?php include "employer-style.css" ?>

      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
 
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
			<li  class="active">
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
			<form action="employer-screen-index.php" method="post">
				<div class="form-input">
					<input type="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search Applicant">
					<button type="submit" name="search-btn" class="search-btn"><i class='bx bx-search' ></i></button>
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
					<h1>Screening</h1>
				</div>
			</div>


			<div class="cards detail">
                <div class="detail-header">
                    <h2>List of Applicants</h2>
                </div>
                <table>
                    <tr>
                        <th>Applicant Name</th>
						<th>Position</th>
						<th>Details</th>
						<th>Resume</th>
                        <th>Date Applied</th>
                    </tr>

					<?php
		include('config.php');
		
		$emp = ($_SESSION['emp_id']);

			$query1 = "SELECT business_name FROM companies WHERE id = '$emp'";
			$result1 = $conn->query($query1);
			
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			$que = $result1->fetch_assoc();
			$query = "SELECT * FROM applicants WHERE CONCAT(job_position, applicant_name) LIKE '%$filtervalues%' AND company_name = '$que[business_name]' AND applicant_status = 'Screening' ORDER BY id DESC";
			$search_result = filterTable($query);
			
		}
		 else {
			
				$que1 = $result1->fetch_assoc();
				$query = "SELECT * FROM applicants WHERE company_name = '$que1[business_name]' AND applicant_status = 'Screening' ORDER BY id DESC";
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
						<td><?php echo $row['job_position']; ?></td>
						<td><button class="details" data-id="<?php echo $row['id']?>" onclick="document.getElementById('details-modal').style.display='block'">View Detais</button></td>
                        
						<td><a href="view-resume.php?app_id=<?php echo $row['id']?>"><button class="resume" id="resume">View Resume</button></a></td>
                        <td><?php echo $row['date_applied']; ?></td>
						<td>
							<button class="suitable"><a href="suitable.php?app_id=<?php echo $row['id']?>">Suitable</a></button>
							</td>
							<td>
							<button class="nsuitable"><a href="not-suitable.php?app_id=<?php echo $row['id']?>">Not Suitable</a></button>
					</td>
                    </tr>

					<!-- DISPLAY APPLICANT DETAILS -->
	<div class="details-modal" id="details-modal">
  <div class="details-modal-content">
  <span class="details-close">&times;</span>
    <h2><?php echo $row['applicant_name']; ?></h2>
    <div class="user-info">
      <p><strong>Age:</strong><?php echo $row['applicant_age']; ?></p>
      <p><strong>Address:</strong><?php echo $row['applicant_address']; ?></p>
      <p><strong>Contact Number:</strong> <?php echo $row['applicant_contact']; ?></p>
      <p><strong>Email:</strong><?php echo $row['applicant_email']; ?></p>
	  <p><strong>Experience:</strong><?php echo $row['applicant_experience']; ?></p>
     
    </div>
  </div>
</div>

<?php endwhile;?>


                </table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="./employer-script.js"></script>
</body>
</html>


			<script>
const modal = document.querySelector(".details-modal");
const closeModalBtn = document.querySelector(".details-close");


closeModalBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (e) => {
  if (e.target === modal) {
	modal.style.display = "none";
  }
});

</script>