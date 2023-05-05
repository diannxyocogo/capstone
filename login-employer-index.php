<?php include('login-employer-server.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Employer | HireFolks</title>
    <link rel="stylesheet" href="login-employer-style.css" />
    </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="login-employer-index.php" method="post" autocomplete="off" class="sign-in-form">
            <?php include('login-employer-error.php'); ?>
           
              <div class="logo">
                <img src="./image/hirefolks-logo.png" alt="HireFolks" />
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>
        
              <!--SIGN IN-->
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                  name="email"
                    type="email"
                    class="input-field"
                    pattern=".+@gmail.com"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                  name="pword"
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
            <form action="login-employer-index.php" method="post" autocomplete="off" class="sign-up-form" enctype="multipart/form-data">
            <?php include('login-employer-error.php'); ?>
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
                  <input
                    type="email"
                    name="employer_email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email Addrress</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    name="employer_bname"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Registered Business Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="pass"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
        <label id="upload-permit" class="button" for="upload" style="margin-top:-1rem;">Upload Business Permit (.pdf)</label><br>
        <input id="upload" type="file" id="business_proof" name="business_proof" onchange="loadFile(event)" required>
      </div>
              
                      

                <input type="submit" value="Sign Up" name="register" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
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

    <script>
      const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
   bullet.addEventListener("mouseover", moveSlider);
});
    </script>
      </body>
</html>
<?php
include('config.php');

// sql to create table
$sql = "CREATE TABLE employer_acc (
id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
employer_img VARCHAR(999) NOT NULL,
employer_email VARCHAR(150) NOT NULL,
employer_bname MEDIUMTEXT NOT NULL,
employer_status VARCHAR(50) NOT NULL,
pass VARCHAR(50) NOT NULL,
overview LONGTEXT NOT NULL,
business_proof BLOB NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>

<?php
include('config.php');

// sql to create table
$sql = "CREATE TABLE companies (
id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
business_name MEDIUMTEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>

<?php
include('config.php');
$sql = "CREATE TABLE jobpost (
  id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company_logo VARCHAR(900) NOT NULL,
  company_name MEDIUMTEXT NOT NULL,
  company_address MEDIUMTEXT NOT NULL,
  job_position MEDIUMTEXT NOT NULL,
  job_description LONGTEXT NOT NULL,
  job_qualification LONGTEXT NOT NULL,
  job_salary VARCHAR(50) NOT NULL,
  job_type VARCHAR(50) NOT NULL,
  keyword1 VARCHAR(50) NOT NULL,
  keyword2 VARCHAR(50) NOT NULL,
  keyword3 VARCHAR(50) NOT NULL,
  overview LONGTEXT NOT NULL,
  jobpost_status VARCHAR(50) NOT NULL
  )";
mysqli_query($db, $sql);

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>