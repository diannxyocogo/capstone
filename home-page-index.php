<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("");
}

// Create database
$sql = "CREATE DATABASE hirefolks";
if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "";
}

$conn->close();
?>
<?php include 'config.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <!-- font -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Nunito&display=swap" rel="stylesheet">
        <!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- swiper -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <!-- My CSS -->
	<style>
  <?php include "home-page-style.css" ?>
</style>
        <title>HireFolks</title>
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar">
            <h2 class="navbar-logo"><a href="#">
                <img src="../home-page/images/logo1.png" height="30" width="150">
            </a></h2>
            <div class="navbar-menu">
                <a href="#jobs">Job Vacancies</a>
                <a href="#companies">Companies</a>
                <a href="#testimoni">Feedbacks</a>
                <a href="#blog">Resources</a>
                <div class="dropdown">
                <button class="signin">Sign In
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../employer/login-employer-index.php">As Employer</a>
                    <a href="../candidate/login-candidate-index.php">As Applicant</a>
                </div>
                </div>
            </div>
            <div class="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
        <!-- header -->
        <header>
            <h1 class="header-title">
                START YOUR <br> <span>CAREER</span> <br> WITH US
            </h1>
        </header>

        <!-- Search -->
        <form action="#" method="post">
        <div class="search-wrapper">
            <div class="search-box">
                <div class="search-card">
                
                    <input class="search-input" name="search" type="text" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Job Title or keywords">
                    <button class="search-button" name="search-btn">Search</button> 
                    
                </div>
            </div>
        </div>
        </form>

        <?php
		if(isset($_POST['search-btn']))
		{
			$filtervalues = ($_POST['search']);
			
			$query = "SELECT * FROM jobpost WHERE CONCAT(company_name, company_address, job_position, job_description, job_qualification, job_salary, job_type, keyword1, keyword2, keyword3) LIKE '%$filtervalues%' AND jobpost_status = 'Posted' ORDER BY id DESC";
			$search_result = filterTable($query);
		}
		 else {
			
			$query = "SELECT * FROM jobpost WHERE jobpost_status = 'Posted' ORDER BY id DESC";
			$search_result = filterTable($query);
		}
		
		// function to connect and execute the query
		function filterTable($query)
		{
			$connect = mysqli_connect("localhost", "root", "", "hirefolks");
			$filter_Result = mysqli_query($connect, $query);
			return $filter_Result;
		}
?>

        <!-- Job Listing-->
        
        <section class="job-list" id="jobs">
        <?php 
        if (mysqli_num_rows($search_result) == 0) {
            echo "<h1 class='section-title'>No job found</h1>";
        }
        else{
           
        while($row = mysqli_fetch_array($search_result)):?>
            <div class="job-card">
                <div class="job-name">
                <img src="../employer/image/<?php echo $row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" class="job-profile">
                    <div class="job-detail">
                        <h4><?php echo $row['company_name']; ?></h4>
                        <h3><?php echo $row['job_position']; ?></h3>
                        <p><?php echo $row['job_description']; ?></p>
                    </div>   
                </div>

                <div class="job-label">
                    <a class="label-a" href="#"><?php echo $row['keyword1']; ?></a>
                    <a class="label-b" href="#"><?php echo $row['keyword2']; ?></a>
                    <a class="label-c" href="#"><?php echo $row['keyword3']; ?></a>
                </div>
                </div>
                <?php endwhile;?>
                <?php } ?>
            
        </section>

        <!-- Join -->
        <section class="join">
            <div class="join-detail">
                <h1 class="section-title">LET'S START YOUR NEW JOB WITH US</h1>
                <p>Some things take time, but with us, you can begin your career right away by simply clicking the apply button. Don't pass up this opportunity to grow, and gather the courage to take the necessary steps.</p>
            </div>
            
        </section>

        <!-- Featured Company -->
        <section class="featured" id="companies">
            <h1 class="section-title">Featured Companies</h1>
            <p>Whether or not you have active job listings, our featured companies are always interested in meeting new talent. Learn more about them and see who is hiring by scrolling down.</p>
            <div class="featured-wrapper">
            <?php include "config.php"; ?>
				<?php 

				$query = "SELECT * FROM employer_acc WHERE employer_status = 'Verified' ORDER BY id DESC";
				$result = $conn->query($query);
	   
			if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
            
            <div class="featured-wrapper">
                <div class="featured-card">
                    <img class="featured-image" src="../employer/image/<?php echo $row['employer_img']; ?>">
                    <p><?php echo $row['employer_bname']; ?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
             </div>




        </section>

       
        <!-- blog -->
        <section class="blog" id="blog">
            <h1 class="section-tile">Career Advices</h1>
            <p>Learn more career tips from company's recruiters</p>
            <div class="blog-wrapper">
                <div class="blog-card">
                    <img class="blog-image" src="images/How-to-Ace-an-Interview.jpg">
                    <div class="blog-detail">
                        <span>10 July 2023</span>
                        <h4>How to Ace an Interview</h4>
                        <p>Check this article to know how will you ace your interview and get tips to conquer your fear in talking and expressing your answer during the interview.</p>
                        <hr class="divider">
                        <a href="https://resources.workable.com/tutorial/how-to-ace-interview" class="blog-more">Read</a>
                    </div>
                </div>
                <div class="blog-card">
                    <img class="blog-image" src="images/How-to-Start-a-Job-Search-in-5-Steps-2-1024x512.jpg">
                    <div class="blog-detail">
                        <span>14 February 2023</span>
                        <h4>How to Start a Job Search</h4>
                        <p>Take a time to read this to simply things or processes in seeking a job. Explore new opportunity and make yourself out of your comfort zone for the development.</p>
                        <hr class="divider">
                        <a href="https://www.flexjobs.com/blog/post/how-to-start-a-job-search-steps/" class="blog-more">Read</a>
                    </div>
                </div>
                <div class="blog-card">
                    <img class="blog-image" src="images/5-Tips-for-Using-Online-Job-Boards-1024x512.jpg">
                    <div class="blog-detail">
                        <span>1 March 2023</span>
                        <h4>Tips for Using Online Job Boards</h4>
                        <p>Get some time to know this and use online job boards effectively. Don't let hard navigation stops you, this will give you the tips to make things easier in finding a job.</p>
                        <hr class="divider">
                        <a href="https://blog.trello.com/starting-a-new-job-and-first-week-success" class="blog-more">Read</a>
                    </div>
                </div>

<!-- FAQs -->
<div class="chatbox-wrapper">
    <div class="chatbox-toggle">
         <i class='far fa-comment'></i>
    </div>
     <div class="chatbox-message-wrapper">
        <div class="chatbox-message-header">
            <div class="chatbox-message-profile">
            <img src="../home-page/images/hirefolks.png" alt="" class="chatbox-message-image">
            <div>
        <h4 class="chatbox-message-name">FAQ's</h4>
    </div>
</div>
</div>

<div class="chatbox-message-content">

<?php include "config.php"; ?>
<?php
    $sql = "SELECT * FROM faqs";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            ?>
<div class="container">
    <div class="wrapper">
        <button class="toggle">
        <?php echo $row['question']; ?>
            <i class="fas fa-plus icon"></i>
        </button>  
    <div class="content">
        <p>
        <?php echo $row['response']; ?>
        </p>
    </div>
 </div>

   <?php
        }
    }
    ?>



</div>
				
			</div>
		</div>
	</div>
</div>
<!-- FAQs -->
            </div>
        </section>
        <!-- footer -->
        <footer>
            <div class="footer-wrapper">
                <h3>HireFolks</h3>
                <p>We are one of the top online platform for job recruiting that simplifies convential staffing and finding a job. With us, you can start your career in just one simple action by joining us here.</p>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            </div>
            <div class="footer-wrapper">
                <h4>Explore</h4>
                <a href="companies">Top Companies</a>
                <a href="jobs">Careers</a>
            </div>
            <div class="footer-wrapper">
                <h4>About</h4>
                <a href="#">FAQ</a>
                <a href="blog">Readings</a>
            </div>
            <div class="footer-wrapper">
                <h4>Support</h4>
                <a href="#">Customer Service</a>
                <a href="#">Partnerships</a>
            </div>
            <div class="footer-wrapper">
                <h4>Community</h4>
                <a href="#">Community</a>
                <a href="#">Invite a Friend</a>
                <a href="blog">Events</a>
            </div>

        </footer>

        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> 
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="home-page-script.js"></script>
        <script src="script.js"></script>

        <script>
            let toggles = document.getElementsByClassName('toggle');
let contentDiv = document.getElementsByClassName('content');
let icons = document.getElementsByClassName('icon');

for(let i=0; i<toggles.length; i++){
    toggles[i].addEventListener('click', ()=>{
        if( parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight){
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            toggles[i].style.color = "#465775";
            icons[i].classList.remove('fa-plus');
            icons[i].classList.add('fa-minus');
        }
        else{
            contentDiv[i].style.height = "0px";
            toggles[i].style.color = "#465775";
            icons[i].classList.remove('fa-minus');
            icons[i].classList.add('fa-plus');
        }

        for(let j=0; j<contentDiv.length; j++){
            if(j!==i){
                contentDiv[j].style.height = "0px";
                toggles[j].style.color = "#465775";
                icons[j].classList.remove('fa-minus');
                icons[j].classList.add('fa-plus');
            }
        }
    });
}
        </script>
    </body>
</html>

