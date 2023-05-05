<!-- EDIT JOB VACANCY MODAL -->
<?php include 'config.php'; ?>
<?php
session_start();
$userid = $_POST['userid'];
 
$sql = "SELECT company_logo, company_name, job_position  FROM jobpost WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
 <h2>Apply Job</h2>
    <form action="apply-job-query.php" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="grid-container">
        <div class="grid-item">
          <label for="input1">Company Name</label>
          <input type="text" id="company_name" name="company_name" value="<?php echo $row['company_name']?>" readonly>
        </div>
        <div class="grid-item">
          <label for="input2">Job Position</label>
          <input type="text" id="input2" name="job_position" value="<?php echo $row['job_position']?>" readonly>
        </div>
        </div>
        <?php } ?>

        <?php
$app_id = ($_SESSION['app_id']);

 
$sql = "SELECT applicant_name, applicant_age, applicant_address, applicant_contact, applicant_email FROM applicants_acc WHERE id = '$app_id'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>

        <h2>Your Details</h2>
        <div class="grid-container">
        <div class="grid-item">
          <label for="input2">Name</label>
          <input type="text" id="input2" name="full-name" value="<?php echo $row['applicant_name']?>">
        </div>
        <div class="grid-item">
          <label for="input2">Age</label>
          <input type="text" id="input2" name="age" value="<?php echo $row['applicant_age']?>">
        </div>
        <div class="grid-item">
          <label for="input2">Address</label>
          <input type="text" id="input2" name="address" value="<?php echo $row['applicant_address']?>">
        </div>
        <div class="grid-item">
          <label for="input2">Contact Number</label>
          <input type="text" id="input2" name="contact-num" value="<?php echo $row['applicant_contact']?>">
        </div>
        <div class="grid-item">
          <label for="input2">Email Address</label>
          <input type="text" id="input2" name="email" value="<?php echo $row['applicant_email']?>">
        </div>
        <label for="input6">Do you have any experience in this job position?</label>
          <select id="experience" name="experience">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        <div class="grid-item">
          <label for="input1">Upload Resume</label>
          <input type="file" id="resume" name="resume">
        </div>

        </div>
        <button type="submit" name="apply" id="apply-submit-modal">Apply</button>
        </form>

        <form action="./candidate-find-jobs-index.php">
        <button id="apply-close-modal" class="closee" onclick="document.getElementById('apply-myModal').style.display='none'">Close</button>
                        </form>
      
  <?php } ?>

    <script src="./employer-script.js"></script>

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

    

    
