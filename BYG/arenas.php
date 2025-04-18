<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

$query = "SELECT * FROM arenas";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Arenas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">

    <div class="text-center py-16">
        <h1 class="text-[12vw] font-bold">Explore the Best Sports Arenas</h1>
        <p class="text-2xl text-gray-400 mt-4 pb-24 pt-8">Book and play at world-class venues.</p>
        <a href="#arenas-section" class="mt-6 px-8 py-4 bg-red-500 text-white text-xl rounded-lg shadow hover:bg-red-600 transition">Explore Arenas</a>
    </div>

    <div id="arenas-section" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-10">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($arena = mysqli_fetch_assoc($result)): ?>
                <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                    <img src="<?= htmlspecialchars($arena['image_url']); ?>" alt="<?= htmlspecialchars($arena['name']); ?>" class="w-full h-64 object-cover rounded-lg">
                    <h2 class="text-2xl font-semibold mt-4"><?= htmlspecialchars($arena['name']); ?></h2>
                    <p class="text-gray-400"><?= htmlspecialchars($arena['location']); ?></p>
                    <p class="text-gray-300"><?= htmlspecialchars($arena['sports']); ?></p>
                    <a href="booking.php?arena_id=<?= $arena['id']; ?>" class="block mt-4 bg-green-500 text-white text-center px-5 py-3 rounded-lg hover:bg-green-600 ">Book Now</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-white text-center text-xl">No arenas available at the moment.</p>
        <?php endif; ?>
    </div>

</body>
</html>