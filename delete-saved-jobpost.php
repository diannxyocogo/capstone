<?php include 'config.php'; ?>
<?php
$userid = $_POST['userid'];
 
$sql = "SELECT * FROM saved_jobs WHERE id = '$userid'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<form action="delete-saved-jobpost-query.php" method="post" autocomplete="off" enctype="multipart/form-data">
	<input type="hidden" name="user_id" value="<?php echo $row['id']?>"/>
	<h2 class="delete-modal-title">Delete Saved Job</h2>
	<p>Are you sure you want to delete this saved job?</p>
	<!-- Modal Buttons -->
	<div class="delete-modal-buttons">
		<button type="submit" name="delete" class="delete-modal-button modal-button-delete">Delete</button>
	  	<button class="delete-modal-button modal-button-cancel" formaction="candidate-saved-jobs-index.php" onclick="closeModal()">Cancel</button>
	</div>
	</form>

	<?php } ?>