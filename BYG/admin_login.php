<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hardcoded credentials
    if ($username === "admin" && $password === "password") {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    <div class="bg-gray-900 p-10 rounded-xl w-full max-w-md shadow-xl">
        <h2 class="text-4xl font-bold text-center text-blue-500">Admin Login</h2>
        <?php if (isset($error)): ?>
            <p class="text-red-500 text-center mt-4"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" class="mt-6">
            <label class="block text-lg font-semibold">Username</label>
            <input type="text" name="username" required
                   class="w-full p-3 mt-2 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label class="block text-lg font-semibold mt-4">Password</label>
            <input type="password" name="password" required
                   class="w-full p-3 mt-2 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg mt-6 text-lg font-semibold hover:bg-blue-600">
                Login
            </button>
        </form>
    </div>
</body>
</html>