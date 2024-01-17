<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  //Load Composer's autoloader
  require "../vendor/autoload.php";

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $mail = new PHPMailer(true);

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */


  try {
    //server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    // $mail->Host = gethostbyname('smtp.gmail.com');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    // $mail->Username = 'contact@sungketpatel.co.uk';
    // $mail->Password = 'XUaegc@6weV9.4M';
    $mail->Username = "sunj.rhymes";
    $mail->Password = "veaz rkjd sevu ubwk";
    $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
    );

    //Recipients
    $mail->setFrom($email, $name);
    // $mail->addAddress("sunj.rhymes@googlemail.com");
    $mail->addAddress("contact@sungketpatel.co.uk");

    //Content
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    echo "email sent";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

?>
