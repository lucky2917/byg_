<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "db_connect.php"; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['otp']) || empty($_POST['otp'])) {
        die("<p class='error'>OTP is required.</p>");
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        die("<p class='error'>Password is required.</p>");
    }

    $otp = trim($_POST['otp']); // Remove extra spaces
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verify OTP
    $stmt = $conn->prepare("SELECT * FROM users WHERE otp=?");
    $stmt->bind_param("s", $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Update password and clear OTP
        $stmt = $conn->prepare("UPDATE users SET password=?, otp='' WHERE otp=?");
        if (!$stmt) {
            die("<p class='error'>Prepare failed: " . $conn->error . "</p>");
        }
        $stmt->bind_param("ss", $new_password, $otp);
        if (!$stmt->execute()) {
            die("<p class='error'>Database error: " . $stmt->error . "</p>");
        }
        
        // Redirect to login page after successful password reset
        header("Location: login.php");
        exit();
    } else {
        echo "<p class='error'>Invalid or expired OTP.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-6 shadow-md rounded-lg text-center w-96 text-white">
        <h2 class="text-xl font-bold mb-4">Reset Password</h2>
        <form method="POST">
            <input type="text" name="otp" required placeholder="Enter OTP"
                class="w-full px-4 py-2 mb-3 border border-gray-600 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="password" name="password" required placeholder="New Password"
                class="w-full px-4 py-2 mb-3 border border-gray-600 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-green-500">
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded transition duration-200">
                Reset Password
            </button>
        </form>
    </div>
</body>
</html>