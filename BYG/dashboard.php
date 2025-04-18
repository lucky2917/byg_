<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$full_name = $_SESSION['full_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BYG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-md text-center">
        <h2 class="text-4xl font-bold text-blue-500">Welcome, <?php echo $full_name; ?>!</h2>
        <p class="text-gray-400 mt-2">Your email: <?php echo $email; ?></p>

        <a href="logout.php" class="mt-6 inline-block bg-red-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-red-600">
            Logout
        </a>
    </div>

</body>
</html>