<?php
include 'config.php';
$userid = $_POST['userid'];
 
$sql = "SELECT * FROM employer_acc WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?><h2>Change Password</h2>
<form action="change-password-query.php" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="grid-containers">
    <div class="grid-items">
      <label for="input1">Current Password</label>
      <input style="width: 100%;" type="password" id="current-password" name="current-password" placeholder="Enter current password...">
    </div>
    <div class="grid-items">
      <label for="input1">New Password</label>
      <input style="width: 100%;" type="password" id="new-password" name="new-password" placeholder="Enter new password...">
    </div>
    <div class="grid-items">
      <label for="input1">Confirm Password</label>
      <input style="width: 100%;" type="password" id="confirm-password" name="confirm-password" placeholder="Confirm  password...">
    </div>
   
    </form>
    <input type="checkbox" onclick="myFunction()"> Show Password

    <div class="save-modal-buttons">
		<button type="submit" name="save" class="save-modal-button modal-button-save">Save</button>
	  	<button class="save-modal-button modal-button-cancel" formaction="candidate-profile-index.php" onclick="closeModal()">Cancel</button>
	</div>
    

    <?php
}
?>

<script>
function myFunction() {
  var x = document.getElementById("current-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }


  var y = document.getElementById("new-password");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }


  var z = document.getElementById("confirm-password");
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
}
</script>