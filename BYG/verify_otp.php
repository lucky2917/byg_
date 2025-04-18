<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connect.php';

// Enable error reporting for debugging (Disable this in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user has an active session with an email
if (!isset($_SESSION['email'])) {
    die("Session expired. Please sign up again.");
}

$email = $_SESSION['email'];
$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = trim($_POST['otp']); // Trim input to avoid spaces

    // Fetch OTP from database
    $sql = "SELECT otp FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $stored_otp);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($stored_otp) {
        if (trim(strval($entered_otp)) === trim(strval($stored_otp))) {
            // Update is_verified to 1
            $update_sql = "UPDATE users SET is_verified = 1 WHERE email = ?";
            $stmt = mysqli_prepare($conn, $update_sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: login.php");
            exit();
        } else {
            $message = "❌ Incorrect OTP! Please try again.";
        }
    } else {
        $message = "❌ No OTP found. Please try signing up again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-4xl font-bold text-center text-blue-500">OTP Verification</h2>
        <p class="text-gray-400 text-center mt-2">Enter the OTP sent to your email to complete registration.</p>

        <?php if ($message): ?>
            <p class="mt-4 p-3 bg-red-500 text-white text-center rounded-lg"><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="verify_otp.php" method="POST" class="mt-6">
            <label class="block text-lg font-semibold">Enter OTP</label>
            <input type="text" name="otp" placeholder="Enter OTP"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg mt-6 text-lg font-semibold hover:bg-blue-600">
                Verify OTP
            </button>
        </form>

        <p class="text-center text-gray-400 mt-6">Didn't receive OTP?  
            <a href="resend_otp.php" class="text-blue-400 hover:text-blue-600 font-semibold">Resend OTP</a>
        </p>
    </div>

</body>
</html>