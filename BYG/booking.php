<?php

session_start();
include 'db_connect.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get arena ID from URL
$arena_id = isset($_GET['arena_id']) ? intval($_GET['arena_id']) : 0;

// Fetch arena details
$arenaQuery = "SELECT * FROM arenas WHERE id = ?";
$stmt = mysqli_prepare($conn, $arenaQuery);
mysqli_stmt_bind_param($stmt, "i", $arena_id);
mysqli_stmt_execute($stmt);
$arenaResult = mysqli_stmt_get_result($stmt);
$arena = mysqli_fetch_assoc($arenaResult);

// Fetch sports and pricing
$sportsQuery = "SELECT sport_name, price FROM sports_pricing WHERE arena_id = ?";
$stmt = mysqli_prepare($conn, $sportsQuery);
mysqli_stmt_bind_param($stmt, "i", $arena_id);
mysqli_stmt_execute($stmt);
$sportsResult = mysqli_stmt_get_result($stmt);
$sports = [];
while ($row = mysqli_fetch_assoc($sportsResult)) {
    $sports[$row['sport_name']] = $row['price'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book <?= htmlspecialchars($arena['name']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function updatePrice() {
            const sportsData = <?= json_encode($sports); ?>;
            let selectedSport = document.getElementById("sport").value;
            let priceDisplay = document.getElementById("price");
            if (selectedSport in sportsData) {
                priceDisplay.innerText = "Price: ₹" + sportsData[selectedSport];
            } else {
                priceDisplay.innerText = "Select a sport to see the price";
            }
        }
    </script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen">
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-4xl font-bold text-center text-blue-500">Book <?= htmlspecialchars($arena['name']); ?></h2>
        <p class="text-gray-400 text-center mt-2"><?= htmlspecialchars($arena['location']); ?></p>

        <form action="process_booking.php" method="POST" class="mt-6">
    <input type="hidden" name="arena_id" value="<?= $arena_id; ?>">
    <input type="hidden" name="facility_name" value="<?= htmlspecialchars($arena['name']); ?>">
            <!-- Sport Selection -->
            <label class="block text-lg font-semibold">Select Sport</label>
            <select name="sport" id="sport" class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg" onchange="updatePrice()" required>
                <option value="">-- Select Sport --</option>
                <?php 
                // Fetch sports from the sports_pricing table dynamically
                $sportsQuery = "SELECT DISTINCT sport_name FROM sports_pricing WHERE arena_id = ?";
                $stmt = mysqli_prepare($conn, $sportsQuery);
                mysqli_stmt_bind_param($stmt, "i", $arena_id);
                mysqli_stmt_execute($stmt);
                $sportsResult = mysqli_stmt_get_result($stmt);

                while ($sport = mysqli_fetch_assoc($sportsResult)): ?>
                    <option value="<?= htmlspecialchars($sport['sport_name']); ?>"><?= htmlspecialchars($sport['sport_name']); ?></option>
                <?php endwhile; ?>
            </select>

            <!-- Price Display -->
            <p id="price" class="text-xl text-green-400 mt-4">Select a sport to see the price</p>

            <!-- Time Slot Selection -->
            <label class="block text-lg font-semibold mt-4">Select Time Slot</label>
            <select name="time_slot" class="w-full p-3 mt-2 bg-gray-800 text-white rounded-lg" required>
                <option value="09:00 AM - 11:00 AM">09:00 AM - 11:00 AM</option>
                <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
            </select>

            <!-- Add-ons Selection -->
            <label class="block text-lg font-semibold mt-4">Select Add-ons (optional)</label>
            <div class="space-y-2 bg-gray-800 p-4 rounded-lg mt-2">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="addons[]" value="Towel Service" class="accent-blue-500">
                    <span>Towel Service (₹30)</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="addons[]" value="Locker Room Access" class="accent-blue-500">
                    <span>Locker Room Access (₹50)</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="addons[]" value="Energy Drink" class="accent-blue-500">
                    <span>Energy Drink (₹40)</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="addons[]" value="Shoe Rental" class="accent-blue-500">
                    <span>Shoe Rental (₹60)</span>
                </label>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg mt-6 text-lg font-semibold hover:bg-green-600">
                Confirm Booking
            </button>
        </form>
    </div>
</body>
</html>