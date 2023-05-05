<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- My CSS -->
	<style>
  <?php include "admin-style.css" ?>
</style>

	<title>Admin | HireFolks</title>
</head>
<body >


	<!-- SIDEBAR -->
	<section id="sidebar">

	<!-- EDIT FAQ's -->
	<div id="edit-myModal" class="edit-modal">
  <div class="edit-modal-content">
	</div>
	</div>

	<!-- Add FAQ's -->
	<div id="add-myModal" class="add-modal">
  <div class="add-modal-content">
	</div>
	</div>

	<!-- DELETE FAQ'S -->
	<div id="delete-modalContainer" class="delete-modal-container">
  <!-- Modal Content -->
  <div class="delete-modal-content">

  </div>
</div>
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
			<li>
				<a href="admin-job-seekers-index.php">
                <i class='fas fa-users'></i>
					<span class="text">Job Seekers</span>
				</a>
			</li>
			<li class="active">
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
			<form action="admin-faqs-index.php" method="post">
				<div class="form-input">
					<input type="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Search FAQ's">
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
					<h1>Frequently Asked Questions</h1>
				</div>
              <button class="add-faqs" name="save-faqs" onclick="document.getElementById('add-myModal').style.display='block'">Add FAQ's</button>
			</div>

           
		
			<div class="cards detail">
				<table>
                <tr>
                <th>ID</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Actions</th>
                </tr>
				
<?php
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			
			$query = "SELECT * FROM faqs WHERE CONCAT(question, response) LIKE '%$filtervalues%'";
			$search_result = filterTable($query);
		}
		 else {
			
			$query = "SELECT * FROM faqs";
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
                <td><?php echo $row['id']?></td>
                        <td><?php echo $row['question']?></td>
						<td><?php echo $row['response']?></td>
						<td>
						<button class="edit" name="edit" data-id='<?php echo $row['id']; ?>' onclick="document.getElementById('edit-myModal').style.display='block'">Edit</button>
							</td>
							<td>
							<button class="delete" data-id='<?php echo $row['id']; ?>' onclick="document.getElementById('delete-modalContainer').style.display='block'">Delete</button>
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

<?php include 'config.php';?>
<?php
if(ISSET($_POST['save-faqs'])){
  
  $q= ($_POST['question']);
  $a = ($_POST['answer']);

  $sql = "INSERT INTO faqs VALUES (NULL, '$q', '$a')";

  if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>
	Saved
  </script>";
  } else {
    echo "Not Saved<script type='text/javascript'>
	Not Saved
  </script>";
  }
}
    mysqli_close($conn);

?>


<script>
	$(document).ready(function(){
                $('.edit').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'edit-faqs.php',
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
                        url: 'delete-faqs.php',
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
	$(document).ready(function(){
                $('.add-faqs').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'add-faqs.php',
                        type: 'post',
                        success: function(response){ 
                            $('.add-modal-content').html(response); 
							jQuery.noConflict();
                            $('#add-myModal').modal('show'); 
                        }
                    });
                });
            });
</script>