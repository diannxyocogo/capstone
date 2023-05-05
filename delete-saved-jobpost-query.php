<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(ISSET($_POST['delete'])){
    include 'config.php';

    $userid = ($_POST['user_id']);

    $sql = "DELETE FROM saved_jobs WHERE id='$userid'";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
	swal({
	  title: 'Saved Job deleted successfully!',
	  icon: 'success',
	  buttons: {
		ok: {
		  text: 'Ok',
		  value: 'ok',
		  className: 'my-ok-btn'
		}
	  },
	 
	}).then((value) => {
	  if (value === 'ok') {
		window.location.href = 'candidate-saved-jobs-index.php';
	  }
	});
  });
</script>";
} else {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
	swal({
	  title: 'Error in deleting saved job!',
	  icon: 'error',
	  buttons: {
		ok: {
		  text: 'Ok',
		  value: 'ok',
		  className: 'my-ok-btn'
		}
	  },
	 
	}).then((value) => {
	  if (value === 'ok') {
		window.location.href = 'candidate-saved-jobs-index.php';
	  }
	});
  });
</script>";
}
}

$conn->close();
?>


