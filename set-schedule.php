
<?php
include 'config.php';
$userid = ($_POST['userid']);
 
$sql = "SELECT * FROM applicants WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
 <h2>Set Interview Date</h2>
    <form action="set-email-notif.php" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="grid-container">
        <div class="grid-item">
          <label for="input1">Set Date</label>
          <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
          <input type="date" name="date">
        </div>
        <div class="grid-item">
          <label for="input1">Time</label>
          <input type="time" id="time" name="time">
        </div>
        <div class="grid-item">
          <label for="input2">Location</label>
          <input type="text" id="input2" name="location">
        </div>
        
      </div>
        <button type="submit" name="set" id="edit-submit-modal">Submit</button>
        </form>

        <form action="./employer-interview-index.php">
        <button type="submit" id="edit-close-modal" class="closee" href="employer-interview-index.php">Close</button>
                        </form>
       
    
 
     
  
    <?php } ?>
    <script src="./employer-script.js"></script>
    

    
