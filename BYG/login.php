<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connect.php'; // Connect to the database

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if email exists and user is verified
    $sql = "SELECT * FROM users WHERE email='$email' AND is_verified = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['full_name'] = $row['full_name'];

            echo "✅ Login successful! Redirecting...";
            header("Location: main.php"); // Redirect to user dashboard
            exit();
        } else {
            echo "❌ Incorrect password!";
        }
    } else {
        echo "❌ User not found or not verified. Please check your email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BYG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-4xl font-bold text-center text-blue-500">Login</h2>
        <p class="text-gray-400 text-center mt-2">Access your account and start booking!</p>

        <form action="login.php" method="POST" class="mt-6">
            <label class="block text-lg font-semibold">Email</label>
            <input type="email" name="email" placeholder="Enter your email"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            
            <label class="block text-lg font-semibold mt-4">Password</label>
            <input type="password" name="password" placeholder="Enter your password"
                class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg mt-6 text-lg font-semibold hover:bg-blue-600">
                Sign In
            </button>
        </form>

        <p class="text-center text-gray-400 mt-6">Don't have an account? 
            <a href="signup.php" class="text-blue-400 hover:text-blue-600 font-semibold">Sign Up</a>
        </p>
        <p class="mt-4 text-sm text-gray-300">
    <a href="forgot_password.php" class="text-blue-500 hover:underline">Forgot Password?</a>
</p>
    </div>

</body>
</html>