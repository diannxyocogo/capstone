<?php 
include('config.php');

// sql to create table
$sql = "CREATE TABLE admin_acc (
id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
admin_email VARCHAR(150) NOT NULL,
pass VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    $insert = mysqli_query($conn, "INSERT INTO admin_acc (admin_email, pass) VALUES ('hirefolks9@gmail.com', '1234')");
$result = mysqli_query($conn, $insert);
  echo "";
} else {
  echo "";
}

$conn->close();
?>

<?php
include('config.php');

// sql to create table
$sql = "CREATE TABLE faqs (
id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question MEDIUMTEXT NOT NULL,
response MEDIUMTEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Admin | HireFolks</title>

</head>
<body>
    <nav class="navbar">
        <h2 class="navbar-logo" style="margin-left: 2rem;">
            <img src="./image/logo1.png" height="30" width="150">
        </h2>
    </nav>
   <div class="box">
    <div class="container">

        <div class="top">
            <span>ADMIN</span>
            <header>Login</header>
        </div>
<form action="admin-login-index.php" method="POST">
        <div class="input-field">
            <input type="text" class="input" name="email" placeholder="Email" id="">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input" name="password" placeholder="Password" id="">
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" name="login" class="submit" value="Login" id="">
        </div>
        </form>

        <div class="two-col">
            <div class="two">
                <label><a href="password-reset.php">Forgot password?</a></label>
            </div>
        </div>
    </div>
</div>  
</body>
</html>

<?php
include('config.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pword = $_POST['password'];

        $sql = "SELECT * FROM admin_acc WHERE admin_email = '$email' AND pass = '$pword'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
    if($count == 1){
        header("location: admin-dashboard-index.php");
    }else{
        echo "<script type='text/javascript'>
        $(document).ready(function() {
           swal({
           title: 'Invalid email or password!',
          
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
            window.location.href = 'admin-login-index.php';
           }
           });
        });
        </script>";
    }
}

?>


