<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!-- My CSS -->
	<style>
  <?php include "employer-style.css" ?>
</style>

	<title>Employer | HireFolks</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">

	<!-- DISPLAY JOB DETAILS -->
	<div class="modal-container" id="myModal">
	
 		 <div class="modal-content">
		 
  		</div>
	</div>

	<!-- EDIT JOB DETAILS -->
	<div id="edit-myModal" class="edit-modal">
  <div class="edit-modal-content">
	</div>
	</div>

 <!-- DELETE JOB POST -->
 <div id="delete-modalContainer" class="delete-modal-container">
  <!-- Modal Content -->
  <div class="delete-modal-content">

  </div>
</div>



<!-- SIDEBAR -->
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
			<li >
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
			<form action="employer-job-posting-index.php" method="post">
				<div class="form-input">
					<input type="search" name ="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search Job Post">
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

		<!-- MAIN -->
		<!-- CARDS -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Job Posting</h1>
				</div>
				<a href ="employer-add-job-index.php"><button class="add-new">Add New Job Vacancy</button></a>
			</div>

			<div class="cards detail">
			<?php
		include('config.php');
		
		$emp = ($_SESSION['emp_id']);

			$query1 = "SELECT business_name FROM companies WHERE id = '$emp'";
			$result1 = $conn->query($query1);
			
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			$que = $result1->fetch_assoc();
			$query = "SELECT * FROM jobpost WHERE CONCAT(company_name, company_address, job_position, job_description, job_qualification, job_salary, job_type, keyword1, keyword2, keyword3) LIKE '%$filtervalues%' AND company_name = '$que[business_name]' ORDER BY id DESC";
			$search_result = filterTable($query);
			
		}
		 else {
			
				$que1 = $result1->fetch_assoc();
				$query = "SELECT * FROM jobpost WHERE company_name = '$que1[business_name]' ORDER BY id DESC";
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
				
				 <div class="card-status">
				<?php
				if($row['jobpost_status'] == 'Reviewing'){
					echo '<span class="status onprogress"><i class="fa fa-circle"></i> Reviewing</span>';
				}
				elseif ($row['jobpost_status'] == 'Declined'){
					echo '<span class="status declined"><i class="fa fa-circle"></i> Declined</span>';
				} 
				else{
					echo '<span class="status posted"><i class="fa fa-circle"></i> Posted</span>';
				}
				?>
				
    </div>
	<div class="card-buttons">
						<button class="edit" data-id='<?php echo $row['id']; ?>' onclick="document.getElementById('edit-myModal').style.display='block'">Edit</button>
						<button class="delete" data-id='<?php echo $row['id']; ?>' onclick="document.getElementById('delete-modalContainer').style.display='block'">Delete</button>
					</div>
						</div>
	<?php endwhile;?>
	
	 </main>
	</section>

	<script src="./employer-script.js"></script>
	
</body>
</html>

<script type='text/javascript'>
             $(document).ready(function(){
                $('.card-container').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'employer-modal-jobpost-ajax.php',
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
                $('.edit').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'update-jobpost.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.edit-modal-content').html(response); 
							jQuery.noConflict();
                            $('#edit-myModal').modal('show'); 
                        }
                    });
                });
            });

			$(document).ready(function(){
                $('.delete').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'delete-jobpost.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.delete-modal-content').html(response); 
                            $('#delete-modalContainer').modal('show'); 
                        }
                    });
                });
            });

            </script>

<script>
    // Function to Open Modal
    function openModal() {
      document.getElementById("delete-modalContainer").style.display = "flex";
    }

    // Function to Close Modal
    function closeModal() {
      document.getElementById("delete-modalContainer").style.display = "none";
    }

    
  </script>
  <script>
/// Get the modal container
var modalContainer = document.querySelector('.modal-container');
var editModal = document.querySelector('#edit-myModal');

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
    editModal.style.display = 'none';
  }
});

</script>
