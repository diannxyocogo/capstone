
<?php include 'config.php';?>
<?php
if(ISSET($_POST['edit'])){
  
  $userid = ($_POST['user_id']);
  $q= ($_POST['question']);
  $a = ($_POST['response']);

  $sql = "UPDATE faqs SET question='$q', response='$a' WHERE id='$userid'";
  $result1 = $conn->query($sql);

  if($result1){
      echo "<script type='text/javascript'> alert('Edited successfully!'); location.href = 'admin-faqs-index.php'</script>";
    } else {
      echo "<script type='text/javascript'> alert('Not saved !'); location.href = 'admin-faqs-index.php'</script>";
    }
   
  }
  mysqli_close($conn);
?>


