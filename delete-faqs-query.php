
<?php include 'config.php';?>
<?php
if(ISSET($_POST['delete'])){
  
  $userid = ($_POST['user_id']);

  $sql = "DELETE FROM faqs WHERE id='$userid'";
  $result1 = $conn->query($sql);

  if($result1){
      echo "<script type='text/javascript'> alert('Deleted successfully!'); location.href = 'admin-faqs-index.php'</script>";
    } else {
      echo "<script type='text/javascript'> alert('Not Deleted !'); location.href = 'admin-faqs-index.php'</script>";
    }
   
  }
  mysqli_close($conn);
?>