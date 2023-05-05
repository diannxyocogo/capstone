<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include('config.php'); ?>
<?php
require ('mailer/src/PHPMailer.php');
require ('mailer/src/SMTP.php');
require ('mailer/src/Exception.php');

session_start();
if(ISSET($_POST['set'])){
    include 'config.php';

        $date= date('Y-m-d', strtotime($_POST['date']));
        $time = date('h:i A', strtotime($_POST['time']));
        $location = ($_POST['location']);
        $id = ($_POST['user_id']);

       
    $sql = "UPDATE applicants SET interview_date = '$date', interview_time = '$time', interview_location = '$location'  WHERE id = '$id'";
    $result1 = $conn->query($sql);

    $que = "SELECT * FROM applicants WHERE id='$id'";
    $result = $conn->query($que);

    $mail = new PHPMailer\PHPMailer\PHPMailer();

		while ($row = mysqli_fetch_array($result)) {

			// Then you will set your variables for the e-mail using the data 
			// from the array.
	
			$emailTo = $row['applicant_email'];
$subject = 'Application';
$body = 'This is your interview schedule. 
<br><br>
<b>Company: ' .$row["company_name"]. '</b> <br>
<b>Interview Date: ' .$row["interview_date"]. '</b> <br>
<b>Interview Time: '  .$row["interview_time"].  '</b> <br>
<b>Interview Location: '  .$row["interview_location"]. '</b> <br>
<br><br>
<b>Thank you!</b>
<br><br>
<b>HireFolks</b>';

$mail->IsSMTP();
$mail->Host = "mail.smtp2go.com";
$mail->SMTPAuth = true;
$mail->Username = "HireFolksCompany";
$mail->Password = "hirefolks";

$mail->SMTPSecure = "tls";

$mail->Port = 2525;

$mail->From = "hirefolks9@gmail.com";
$mail->FromName = "HireFolks";

$mail->addAddress($emailTo);
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = $body;

if(!$mail->send()) {
    echo "";
	
} else {
	echo "<script type='text/javascript'>
    $(document).ready(function() {
      swal({
        title: 'Interview set successfully!',
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
          window.location.href = 'employer-interview-index.php';
        }
      });
    });
  </script>";
}
		}
	}
?>