<!-- EDIT JOB VACANCY MODAL -->

<?php
include 'config.php';
$userid = $_POST['userid'];
 
$sql = "SELECT * FROM jobpost WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
 <h2>Edit Job Vacancy</h2>
    <form action="update-jobpost-query.php" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="grid-container">
        <div class="grid-item">
          <label for="input1">Upload Company Logo</label>
          <input type="file" id="company_logo" name="company_logo" value="<?php echo $row['company_logo']?>">
        </div>
        <div class="grid-item">
          <label for="input1">Company Name</label>
          <input type="hidden" name="user_id" value="<?php echo $row['id']?>"/>
          <input type="text" id="company_name" name="company_name" value="<?php echo $row['company_name']?>" required>
        </div>
        <div class="grid-item">
          <label for="input1">Company Address</label>
          <input type="text" id="input1" name="company_add" value="<?php echo $row['company_address']?>" required>
        </div>
        <div class="grid-item">
          <label for="input2">Job Position</label>
          <input type="text" id="input2" name="job_position" value="<?php echo $row['job_position']?>" required>
        </div>
        <div class="grid-item">
          <label for="input3">Job Description</label>
          <input type="text" id="input3" name="job_description" value="<?php echo $row['job_description']?>" required>
        </div>
        <div class="grid-item">
          <label for="input4">Job Qualifications</label>
          <textarea id="input4" name="job_qualification" required> <?php echo $row['job_qualification']?> </textarea>
        </div>
        <div class="grid-item">
          <label for="input5">Salary</label>
          <input type="text" id="input5" name="job_salary" value="<?php echo $row['job_salary']?>" required>
        </div>
        <div class="grid-item">
          <label for="input6">Job Type</label>
          <select id="jtype" name="jtype" value="<?php echo $row['job_type']?>" required>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
          </select>
        </div>
        <div class="grid-item">
          <label for="input7">Keyword 1</label>
          <input type="text" id="input7" name="keyword1" value="<?php echo $row['keyword1']?>">
        </div>
        <div class="grid-item">
          <label for="input8">Keyword 2</label>
          <input type="text" id="input8" name="keyword2" value="<?php echo $row['keyword2']?>">
        </div>
        <div class="grid-item">
          <label for="input9">Keyword 3</label>
          <input type="text" id="input9" name="keyword3" value="<?php echo $row['keyword3']?>">
        </div>
      </div>
        <button type="submit" name="update" id="edit-submit-modal">Submit</button>
        </form>

        <form action="./employer-job-posting-index.php">
        <button type="submit" id="edit-close-modal" class="closee" href="employer-job-posting-index.php">Close</button>
                        </form>
       
    
 
     
  
    <?php } ?>
    <script src="./employer-script.js"></script>
    

    
