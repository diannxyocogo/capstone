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
  <?php include "./employer-style.css" ?>
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
			<li class="active">
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
					<h1>Add New Job Vacancy</h1>
				</div>
			</div>
				<div class="form">

					<div>
                        <form action="employer-add-job-index.php" method="post" autocomplete="off" enctype="multipart/form-data">
						
						  
						<label for="clogo">Company Logo</label>
                          <input type="file" id="clogo" name="companylogo" accept=".jpg, .jpeg, .png" required>

						 
						  <?php
		include('config.php');
		$emp = ($_SESSION['emp_id']);

			$query1 = "SELECT id FROM companies WHERE id = '$emp'";
			$result1 = $conn->query($query1);
   
		if ($result1->num_rows > 0) {
			$que1 = $result1->fetch_assoc();
			$query2 = "SELECT * FROM companies WHERE id = '$que1[id]'";
			$result2 = $conn->query($query2);

        while($row = $result2->fetch_assoc()) {
            ?>
			 <label for="cname">Company Name</label>
			 <input type="text" id="cname" name="companyname" value="<?php echo $row['business_name']?>" readonly>

			 <input type="hidden" name="app_id" value="<?php echo $row['id']?>">
						  <?php
            }
		}
        else{
            echo "";
		}
        ?>

<?php
		include('config.php');
		$emp = ($_SESSION['emp_id']);

			$query = "SELECT overview FROM employer_acc WHERE id = '$emp'";
			$result = $conn->query($query);


        while($row = $result->fetch_assoc()) {
            ?>
			 <label for="cname">Company Overview</label>
			 <input type="text" id="overview" name="overview" value="<?php echo $row['overview']?>" readonly>

						  <?php
            }
        ?>
						  <label for="cname">Company Address</label>
                          <input type="text" id="cadd" name="companyadd" placeholder="Enter Company address.." required>
                      
                          <label for="jposition">Job Position</label>
                          <input type="text" id="jposition" name="jobposition" placeholder="Enter Job Position.." required>

                          <label for="jdescription">Job Description</label>
                          <input type="text" id="jdescription" name="jobdescription" placeholder="Enter Job Description.." required>

                          <label for="jqualification">Job Qualification</label>
						  <textarea id="jqualification" name="jqualification"></textarea>

                          <label for="jposition">Salary</label>
                          <input type="text" id="salary" name="salary" placeholder="Enter a salary per month..">

                          <label for="jobtype">Job Type</label>
                          <select id="jtype" name="jtype">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                          </select>
                          
                          <label for="keyword">Keyword 1</label>
                          <input type="text" id="kword1" name="keyword1" placeholder="Enter a Keyword..">

                          <label for="keyword">Keyword 2</label>
                          <input type="text" id="kword2" name="keyword2" placeholder="Enter a Keyword..">

                          <label for="keyword">Keyword 3</label>
                          <input type="text" id="kword3" name="keyword3" placeholder="Enter a Keyword..">
                        
                         <input type="submit" name="save" value="Save">
                          
                        </form>
                        
                        <form action="./employer-job-posting-index.php">
                            <input type="submit" value="Exit">
                        </form>
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
if(isset($_POST["save"])){
	include('config.php');
	$emp = ($_SESSION['emp_id']);
	
	$logo= $_FILES['companylogo']['name'];
		$tempname= $_FILES['companylogo']['tmp_name'];
		$folder= "../employer/image/".$logo;

		$bname = ($_POST['companyname']);
		$overview = ($_POST['overview']);
	$cadd = ($_POST['companyadd']);
	$position = ($_POST['jobposition']);
	$description = ($_POST['jobdescription']);
	$qualification = ($_POST['jqualification']);
	$salary = ($_POST['salary']);
	$jtype = ($_POST['jtype']);
	$kword1 = ($_POST['keyword1']);
	$kword2 = ($_POST['keyword2']);
	$kword3 = ($_POST['keyword3']);

	$sql = "INSERT INTO jobpost VALUES (NULL, '$logo', '$bname', '$cadd', '$position', '$description', '$qualification', '$salary', '$jtype', '$kword1', '$kword2', '$kword3', '$overview', 'Reviewing')";
mysqli_query($conn, $sql);

// insert in database 
if (move_uploaded_file($tempname, $folder)) {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
	swal({
	  title: 'Job Posted!',
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
		window.location.href = 'employer-job-posting-index.php';
	  }
	});
  });
</script>";
} else {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
	swal({
	  title: 'Job Post not saved!',
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
		window.location.href = 'employer-job-posting-index.php';
	  }
	});
  });
</script>";
}
mysqli_close($conn);
}

?>