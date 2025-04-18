<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connect.php';

// Load PHPMailer
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error = ''; // To store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_result) == 0) {
        $error = "❌ Error: Email is not registered!";
    } else {
        // Generate a new OTP
        $otp = rand(100000, 999999);

        // Update OTP in the database
        $update_otp = "UPDATE users SET otp = '$otp' WHERE email = '$email'";
        if (mysqli_query($conn, $update_otp)) {
            $_SESSION['email'] = $email; // Store email in session for verification

            // Send OTP via Email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'arjun.gandreddi2005@gmail.com'; // Update with your email
                $mail->Password = 'pptm tqwz cdpx nyob'; // Use an App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('arjun.gandreddi2005@gmail.com', 'BYG Sports Booking');
                $mail->addAddress($email);
                $mail->Subject = 'Password Reset OTP - BYG';
                $mail->Body = "Hello,\n\nYour OTP for password reset is: $otp\n\nUse this OTP to reset your password.\n\nThank you!";

                if ($mail->send()) {
                    header("Location: reset_password.php");
                    exit();
                } else {
                    $error = "❌ Error sending email: " . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                $error = "❌ Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            $error = "❌ Database Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - BYG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-4xl font-bold text-center text-blue-500">Forgot Password</h2>
        <p class="text-gray-400 text-center mt-2">Enter your email to receive a reset OTP</p>

        <?php if ($error): ?>
            <p class="text-red-500 text-center mt-4"><?= $error ?></p>
        <?php endif; ?>

        <form action="forgot_password.php" method="POST" class="mt-6">
            <label class="block text-lg font-semibold">Email</label>
            <input type="email" name="email" placeholder="Enter your email"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg mt-6 text-lg font-semibold hover:bg-blue-600">
                Send OTP
            </button>
        </form>

        <p class="text-center text-gray-400 mt-6">Remember your password?  
            <a href="login.php" class="text-blue-400 hover:text-blue-600 font-semibold">Login</a>
        </p>
    </div>

</body>
</html>