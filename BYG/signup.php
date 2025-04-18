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

$error = '';  // To store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $otp = rand(100000, 999999); // Generate 6-digit OTP

    // Check if the email is already registered
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_result) > 0) {
        $error = "❌ Error: Email is already registered!";
    } else {
        // Insert user details into the database
        $sql = "INSERT INTO users (full_name, email, password, otp, is_verified) VALUES ('$full_name', '$email', '$password', '$otp', 0)";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['email'] = $email;

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

                $mail->setFrom('arjun.gandredi2005@gmail.com', 'BYG Sports Booking');
                $mail->addAddress($email);
                $mail->Subject = 'Your OTP for BYG Registration';
                $mail->Body = "Hello $full_name,\n\nYour OTP for account verification is: $otp\n\nThank you for using BYG!";

                if ($mail->send()) {
                    header("Location: verify_otp.php");
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
    <title>Sign Up - BYG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-4xl font-bold text-center text-blue-500">Create Account</h2>
        <p class="text-gray-400 text-center mt-2">Join BYG and start booking sports facilities today!</p>

        <?php if ($error): ?>
            <p class="text-red-500 text-center mt-4"><?= $error ?></p>
        <?php endif; ?>

        <form action="signup.php" method="POST" class="mt-6">
            <label class="block text-lg font-semibold">Full Name</label>
            <input type="text" name="full_name" placeholder="Enter your full name"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            
            <label class="block text-lg font-semibold mt-4">Email</label>
            <input type="email" name="email" placeholder="Enter your email"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            
            <label class="block text-lg font-semibold mt-4">Password</label>
            <input type="password" name="password" placeholder="Create a password"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            
            <label class="block text-lg font-semibold mt-4">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm your password"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        
            <div class="mt-4 flex items-center">
                <input type="checkbox" name="terms" class="form-checkbox text-blue-500" required>
                <span class="ml-2 text-gray-400 text-sm">I agree to the <a href="#" class="text-blue-400 hover:text-blue-600">Terms & Conditions</a></span>
            </div>
        
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg mt-6 text-lg font-semibold hover:bg-blue-600">
                Sign Up
            </button>
        </form>

        <p class="text-center text-gray-400 mt-6">Already have an account?  
            <a href="login.php" class="text-blue-400 hover:text-blue-600 font-semibold">Login</a>
        </p>
    </div>

</body>
</html>