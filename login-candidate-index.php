<?php include('login-candidate-server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Applicant | HireFolks</title>
    <style>
  <?php include "login-candidate-style.css" ?>
</style>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

          <!--SIGN IN-->
            <form action="login-candidate-index.php" method="post" autocomplete="off" class="sign-in-form">
            <?php include('login-candidate-errors.php'); ?>
              <div class="logo">
                <img src="./image/hirefolks-logo.png" alt="HireFolks" />
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input name="email"
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    pattern=".+@gmail.com"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input name="pword"
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <button name="login" class="sign-btn" type="submit">Sign In </button>

    

                <p class="text">
                  Forgotten password?
                  <a href="password-reset.php">Get help</a> signing in
                </p>
              </div>
            </form>


      <!--SIGN UP-->
            <form action="login-candidate-index.php" method="post" autocomplete="off" class="sign-up-form">
            <?php include('login-candidate-errors.php'); ?>
              <div class="logo">
                <img src="./image/hirefolks-logo.png" alt="HireFolks" />

              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>
              
              <div class="actual-form">
                <div class="input-wrap">
                  <input name="candidate_name"
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Full Name</label>
                </div>

                <div class="input-wrap">
                  <input name="candidate_age"
                    type="number"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Age</label>
                </div>

                <div class="input-wrap">
                  <input name="candidate_address"
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Address</label>
                </div>

                <div class="input-wrap">
                <input name="candidate_contact"
                    type="number"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Contact Number</label>
                </div>

                <div class="input-wrap">
                <input name="candidate_email"
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    pattern=".+@gmail.com"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input name="pass"
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <button name="register" class="sign-btn" type="submit">Sign Up </button>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper" data-swiper-autoplay="2000">
              <img src="./image/img1.jpg" class="image img-1 show" alt="" />
              <img src="./image/img2.jpg" class="image img-2" alt="" />
              <img src="./image/img3.jpeg" class="image img-3" alt="" />
            </div>
           

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Find the perfect job</h2>
                  <h2>Start your career with us</h2>
                  <h2>Build your future</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="login-candidate-script.js"></script>
      </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HireFolks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("");
}

// sql to create table
$sql = "CREATE TABLE applicants_acc (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
applicant_img BLOB NOT NULL,
applicant_name MEDIUMTEXT NOT NULL,
applicant_age INT(7) NOT NULL,
applicant_address MEDIUMTEXT NOT NULL,
applicant_contact VARCHAR(350) NOT NULL,
applicant_email MEDIUMTEXT NOT NULL,
pass VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HireFolks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("");
}

// sql to create table
$sql = "CREATE TABLE saved_jobs (
id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				company_logo BLOB NOT NULL,
				company_name MEDIUMTEXT NOT NULL,
				company_address MEDIUMTEXT NOT NULL,
				job_position MEDIUMTEXT NOT NULL,
				job_description MEDIUMTEXT NOT NULL,
				job_qualification MEDIUMTEXT NOT NULL,
				job_salary MEDIUMTEXT NOT NULL,
				job_type VARCHAR(50) NOT NULL,
				keyword1 VARCHAR(50) NOT NULL,
				keyword2 VARCHAR(50) NOT NULL,
				keyword3 VARCHAR(50) NOT NULL,
        overview LONGTEXT NOT NULL,
        applicant_id INT(7) NOT NULL
				)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HireFolks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("");
}

// sql to create table
$sql = "CREATE TABLE applicants_profile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
applicant_name MEDIUMTEXT NOT NULL,
applicant_age VARCHAR(50) NOT NULL,
applicant_address MEDIUMTEXT NOT NULL,
applicant_email VARCHAR(50) NOT NULL,
applicant_contact VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HireFolks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("");
}

// sql to create table
$sql = "CREATE TABLE applicants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name MEDIUMTEXT NOT NULL,
job_position MEDIUMTEXT NOT NULL,
applicant_name MEDIUMTEXT NOT NULL,
applicant_age VARCHAR(50) NOT NULL,
applicant_address MEDIUMTEXT NOT NULL,
applicant_contact VARCHAR(50) NOT NULL,
applicant_email VARCHAR(50) NOT NULL,
applicant_resume BLOB NOT NULL,
applicant_experience VARCHAR(50) NOT NULL,
applicant_status VARCHAR(50) NOT NULL,
interview_date VARCHAR(50) NOT NULL,
interview_time VARCHAR(50) NOT NULL,
interview_location MEDIUMTEXT NOT NULL,
date_applied VARCHAR(50) NOT NULL,
starting_date VARCHAR(50) NOT NULL,
starting_location MEDIUMTEXT NOT NULL,
applicant_id INT(7) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>


