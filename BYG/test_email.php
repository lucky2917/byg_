<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2; // Enable debugging
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'arjun.gandreddi2005@gmail.com';
    $mail->Password = 'pptm tqwz cdpx nyob';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('your-email@gmail.com', 'Test Email');
    $mail->addAddress('your-email@gmail.com');

    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email from PHPMailer';

    if ($mail->send()) {
        echo "✅ Test Email Sent Successfully!";
    } else {
        echo "❌ Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "❌ Mailer Error: " . $mail->ErrorInfo;
}
?>