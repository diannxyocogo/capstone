
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Employer | HireFolks</title>
   

    <style>
        body{
            background: hsla(212, 35%, 58%, 1);

background: linear-gradient(90deg, hsla(212, 35%, 58%, 1) 0%, hsla(218, 32%, 80%, 1) 100%);

background: -moz-linear-gradient(90deg, hsla(212, 35%, 58%, 1) 0%, hsla(218, 32%, 80%, 1) 100%);

background: -webkit-linear-gradient(90deg, hsla(212, 35%, 58%, 1) 0%, hsla(218, 32%, 80%, 1) 100%);

        }
 .container-reset {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.reset-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0px 0px 10px #aaa;
  max-width: 400px;
  width: 100%;
}

.lbl {
  margin-bottom: 10px;
}

#text-box-reset {
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
}

.reset-button {
  font-size: 0.9rem;
  width: 100%;
  max-width: 200px;
	cursor: pointer;
	margin: 0 10px;
	padding: 10px 20px;
	border: none;
	background-color: #007bff;
	color: #fff;
	border-radius: 4px;
	font-size: 0.9rem;
	
  }
.delete-modal-buttons {
	display: flex;
	justify-content: center;
	margin-top: 20px;
  }
  .reset {
	background-color: #304C89;
  }
  .reset:hover {
	background-color: #1f3056;
  }
  .cancel {
	background-color: #304C89;
  }
  .cancel:hover {
	background-color: #1f3056;
  }



    </style>
  </head>
  <body>


    <div class="container-reset">
        <form action="password-reset.php" method="post" class="reset-form">
          <label for="text-box-reset" class="lbl">Enter email:<label>
          <input type="text" id="text-box-reset" name="text-box-reset">
          <div class="delete-modal-buttons">
		        <button type="submit" name="reset" class="reset-button reset">Send Email</button>
	        	<button class="reset-button cancel" formaction="login-employer-index.php">Cancel</button>
	     </div>
         
        </form>
      </div>
      
      </body>
</html>

<?php
include_once 'config.php';
require ('mailer/src/PHPMailer.php');
require ('mailer/src/SMTP.php');
require ('mailer/src/Exception.php');

if(isset($_POST['reset']))
{
    $email = $_POST['text-box-reset'];
    $result = mysqli_query($conn,"SELECT * FROM employer_acc where employer_email= '$email'");
    $row = mysqli_fetch_assoc($result);
	$email_db=$row['employer_email'];
	$password=$row['pass'];
	if($email==$email_db) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();

			$emailTo = $row['employer_email'];
$subject = 'Forgot Password';
$body = '<b>Your password is: </b> '.$password. '  <br><br>
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
    echo "<script type='text/javascript'>
    $(document).ready(function() {
      swal({
        title: 'Error in sending email!',
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
          window.location.href = 'login-employer-index.php';
        }
      });
    });
  </script>";
	
} else {
	echo "<script type='text/javascript'>
    $(document).ready(function() {
      swal({
        title: 'Email sent successfully!',
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
          window.location.href = 'login-employer-index.php';
        }
      });
    });
  </script>";
}
		} else{
            echo "<script type='text/javascript'>
            $(document).ready(function() {
              swal({
                title: 'Email does not exist!',
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
                  window.location.href = 'login-employer-index.php';
                }
              });
            });
          </script>";
        }
}
?>