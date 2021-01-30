<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'] ;
    $service = $_POST['service'];
    $radio1 = $_POST['radio1'];
    // $from_value = $_POST['from_value'];
    // $to_value = $_POST['to_value'];
    // $value = $_POST['value'];
    // $subject = $_POST['subject'];
    $message = $_POST['message'];
    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'address of gmail.com';
      // Gmail Password
      $mail->Password = 'Password';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('address gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('address gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>name : $name <br>email : $email <br>phone : $phone <br>company : $company<br>service : $service<br>radio1 : $radio1<br> Message : $message</h3>";

      $mail->send();

      $output = '<div class="alert alert-success">
                  <h5 style="font-size:30px">Your message has been received and is being reviewed. One of our professionals will be in touch with you shortly!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>send us requirement</title>
  <link rel='stylesheet' href='assets/css/bootstrap.min.css' />
  <script type="text/javascript">
setTimeout(function () {    
    window.location.href = 'http://ecerasystem.com/index.php'; 
},3000); 

 </script> 
</head>

<body class="bg-info">

      <section class="page__hero">
      <div class="hero">
        <div class="hero__bg">
                  </div>
        <div class="hero__content">
          <div class="hero__content__inner">
            <div class="row">
              <div class="column">
                <h2 class="heading-1 text-white">Thank you for contacting us!</h1>
                  
              </div>
            </div>
                      </div>
        </div>
      </div>
    </section>
  
<div class="form-group">
<?= $output; ?>
</div>
     



</body>

</html>

<?php 
  
// Redirect browser 
header("refresh:10; Location: https://ecerasystem.com"); 
  
exit; 
?> 
