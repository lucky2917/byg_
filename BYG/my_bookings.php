<?php
session_start();
include 'db_connect.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user bookings
$query = "SELECT b.*, a.name AS arena_name FROM bookings b 
          JOIN arenas a ON b.arena_id = a.id 
          WHERE b.user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-2xl">
        <h2 class="text-4xl font-bold text-center text-blue-500">My Bookings</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <ul class="mt-6 space-y-4">
                <?php while ($booking = mysqli_fetch_assoc($result)): ?>
                    <li class="p-4 bg-gray-800 rounded-lg">
                        <p class="text-lg"><strong>Arena:</strong> <?= htmlspecialchars($booking['arena_name']); ?></p>
                        <p class="text-lg"><strong>Sport:</strong> <?= htmlspecialchars($booking['sport']); ?></p>
                        <p class="text-lg"><strong>Time Slot:</strong> <?= htmlspecialchars($booking['time_slot']); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p class="text-center text-gray-400 mt-4">No bookings found.</p>
        <?php endif; ?>

        <div class="mt-6 text-center">
            <a href="arenas.php" class="text-blue-400 hover:text-blue-600 font-semibold">Book Another Arena</a>
        </div>
    </div>
</body>
</html>