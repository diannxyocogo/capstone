<?php
include 'config.php';

$userid = $_POST['userid'];
 
$sql = "SELECT * FROM jobpost WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);


while( $row = mysqli_fetch_array($result) ){
?>
<a href ="candidate-find-jobs-index.php"><span class="close">&times;</span></a>
 <img class="company-logo" src="../employer/image/<?php echo $row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>">
	<p class="company-name"><?php echo $row['company_name']; ?></p>
    <h2 class="job-title"><?php echo $row['job_position']; ?></h2>
    <p class="job-description"><?php echo $row['job_description']; ?></p>
    <p class="job-type"><i class="fas fa-briefcase"></i><?php echo $row['job_type']; ?></p>
	<div class="job-details">
      <div class="job-detail">
        <i class="fas fa-money-bill-wave"></i>
        <span class="job-salary">₱<?php echo $row['job_salary']; ?> per month</span>
      </div>
      <div class="job-detail">
        <i class="fas fa-map-marker-alt"></i>
        <span class="company-address"><?php echo $row['company_address']; ?></span>
      </div>
    </div>
    <h3 class="job-qualifications-title">Job Qualifications:</h3>
    <ul class="job-qualifications-list" style="text-align: left;">
    <?php 
        $string = $row['job_qualification']; 
        $cut = explode('.', $string);
        for ($i=0; $i < sizeof($cut); $i++) { 
          echo "<li style='list-style-type: disc;
          color: var(--dark);
          font-size: 16px;
          margin-right: 5px;'>" .$cut[$i]. "</li>";
        } ?>
    </ul><br>

    <hr style="background-color: #623412"> <br>
    <h3> Company's Overview </h3>
    <p> <?php echo $row['overview']; ?> </p>
<?php } ?>


  

<script>
/// Get the modal container
var modalContainer = document.querySelector('.modal-container');
var editModal = document.querySelector('.edit-modal');

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

