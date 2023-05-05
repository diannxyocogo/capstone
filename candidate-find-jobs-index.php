<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- My CSS -->
    <style>
  <?php include "candidate-style.css" ?>
</style>
	

	<title>Applicant | HireFolks</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<!-- DISPLAY JOB DETAILS -->
	<div class="modal-container" id="myModal">
	
	<div class="modal-content">
   
	</div>
</div>

<!-- APPLY JOB -->
<div id="apply-myModal" class="apply-modal">
  	<div class="apply-modal-content"></div>
</div>

	
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
			<li  class="active">
				<a href="#">
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
			<form action="candidate-find-jobs-index.php" method="post">
				<div class="form-input">
					<input type="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search Job Vacancy">
					<button type="submit" name="search-btn"  class="search-btn"><i class='bx bx-search' ></i></button>
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
					<h1>Find Jobs</h1>
				</div>
			</div>

			<div class="cards detail">
			

<?php
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			
			$query = "SELECT * FROM jobpost WHERE CONCAT(company_name, company_address, job_position, job_description, job_qualification, job_salary, job_type, keyword1, keyword2, keyword3) LIKE '%$filtervalues%' AND jobpost_status = 'Posted' ORDER BY id DESC";
			$search_result = filterTable($query);
		}
		 else {
			
			$query = "SELECT * FROM jobpost WHERE jobpost_status = 'Posted' ORDER BY id DESC";
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
				
	
						<div class="card-buttons">
							<a href="save-jobpost.php?job_id=<?php echo $row['id']?>"><button class="save" id="save" onclick="change()">Save</button></a>
							<button class="apply" data-id='<?php echo $row['id']; ?>' onclick="document.getElementById('apply-myModal').style.display='block'">Apply</button>
						</div>
						</div>
	<?php endwhile;?>

		 
			</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="candidate-script.js"></script>
	
</body>
</html>
<script type='text/javascript'>
             $(document).ready(function(){
                $('.card-container').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'candidate-jobpost-ajax.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-content').html(response); 
                            $('#myModal').modal('show'); 
                        }
                    });
                });
            });
            
			$(document).ready(function(){
                $('.apply').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'apply-job.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.apply-modal-content').html(response); 
                            $('#apply-myModal').modal('show'); 
                        }
                    });
                });
            });

            </script>
			<script>
/// Get the modal container
var modalContainer = document.querySelector('.modal-container');
var applyModal = document.querySelector('#apply-myModal');

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

window.addEventListener('click', function(event) {
  if (event.target == editModal) {
    applyModal.style.display = 'none';
  }
});
</script>
