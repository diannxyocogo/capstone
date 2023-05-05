<!-- EDIT JOB VACANCY MODAL -->

<?php
include 'config.php';
$userid = $_POST['userid'];
 
$sql = "SELECT * FROM faqs WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
 <h2>Edit FAQ's</h2>
    <form action="edit-faqs-query.php" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="grid-container">
        <div class="grid-item">
          <label for="input1">Question</label>
          <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
          <input type="text" id="question" name="question" value="<?php echo $row['question']?>">
        </div>
        <div class="grid-item">
          <label for="input1">Response</label>
          <input type="text" id="response" name="response" value="<?php echo $row['response']?>">
        </div>
       </div>
        <button type="submit" name="edit" id="edit-submit-modal">Submit</button>
        </form>

        <form action="./admin-faqs-index.php">
        <button type="submit" id="edit-close-modal" class="closee" href="admin-faqs-index.php">Close</button>
                        </form>
       
    <?php } ?>
    

    
