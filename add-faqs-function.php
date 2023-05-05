<?php include "config.php" ?>
<?php

if(ISSET($_POST['set'])){

    $q = ($_POST['question']);
    $a = ($_POST['answer']);

    $sql = "INSERT INTO faqs VALUES (NULL, '$q', '$a')";
    $result1 = $conn->query($sql);

    if($result1){
        echo "<script type='text/javascript'> alert('Saved'); location.href = 'admin-faqs-index.php'</script>";
      } else {
        echo "<script type='text/javascript'> alert('Not Saved'); location.href = 'admin-faqs-index.php'</script>";
      }
     
    }
    mysqli_close($conn);
?>
