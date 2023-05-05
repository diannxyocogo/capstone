<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include('config.php'); ?>
<?php
require ('mailer/src/PHPMailer.php');
require ('mailer/src/SMTP.php');
require ('mailer/src/Exception.php');

session_start();
if(ISSET($_REQUEST['emp_id'])){

	$id=$_REQUEST['emp_id'];

	$que = "SELECT * FROM employer_acc WHERE id='$id'";
        $result = $conn->query($que);

    $sql = "UPDATE employer_acc SET employer_status = 'Verified' WHERE id = '$id'";
    $result1 = $conn->query($sql);

    $mail = new PHPMailer\PHPMailer\PHPMailer();

		while ($row = mysqli_fetch_array($result)) {

			// Then you will set your variables for the e-mail using the data 
			// from the array.
	
			$emailTo = $row['employer_email'];
$subject = 'Verification';
$body = 'Your account has been verified. You can now login to your account. 
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
		 title: 'Account verified!',
		
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
			window.location.href = 'admin-companies-index.php';
		 }
	   });
	});
  </script>";
}
		}
	}
?>