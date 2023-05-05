<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include('config.php'); ?>
<?php
	
	if(ISSET($_REQUEST['job_id'])){
		$id=$_REQUEST['job_id'];
       
        $sql="UPDATE jobpost SET jobpost_status = 'Declined' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>
  $(document).ready(function() {
     swal({
       title: 'Job Vacancy declined!',
      
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
          window.location.href = 'admin-dashboard-index.php';
       }
     });
  });
</script>";
} else {
  echo "";
}
}
$conn->close();
?>