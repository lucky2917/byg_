<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connect.php'; // Connect to DB

$query = "
    SELECT b.id, u.full_name, u.email, b.facility_name, b.sport, b.time_slot, b.booking_date, b.addons
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    ORDER BY b.booking_date DESC
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - BYG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
    <div class="p-8 max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-blue-500 mb-6">Admin Dashboard - All Bookings</h1>
        <?php
        // Total bookings
        $countQuery = "SELECT COUNT(*) as total FROM bookings";
        $countResult = mysqli_query($conn, $countQuery);
        $totalBookings = mysqli_fetch_assoc($countResult)['total'];
        
        // Total revenue
        $revenueQuery = "SELECT SUM(price) as total_revenue FROM bookings";
        $revenueResult = mysqli_query($conn, $revenueQuery);
        $totalRevenue = mysqli_fetch_assoc($revenueResult)['total_revenue'] ?? 0;
        ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-md text-center">
                <h2 class="text-2xl font-semibold text-white">Total Bookings</h2>
                <p class="text-4xl text-blue-400 mt-2"><?= $totalBookings ?></p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-md text-center">
                <h2 class="text-2xl font-semibold text-white">Total Revenue</h2>
                <p class="text-4xl text-green-400 mt-2">₹<?= number_format($totalRevenue, 2) ?></p>
            </div>
        </div>

        <div class="mb-4 text-right">
            <a href="admin_logout.php" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white font-semibold">Logout</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-600 text-sm">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-4 py-3 border border-gray-600">#</th>
                        <th class="px-4 py-3 border border-gray-600">User</th>
                        <th class="px-4 py-3 border border-gray-600">Email</th>
                        <th class="px-4 py-3 border border-gray-600">Facility</th>
                        <th class="px-4 py-3 border border-gray-600">Sport</th>
                        <th class="px-4 py-3 border border-gray-600">Time Slot</th>
                        <th class="px-4 py-3 border border-gray-600">Date</th>
                        <th class="px-4 py-3 border border-gray-600">Add-ons</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-900">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="hover:bg-gray-700">
                                <td class="px-4 py-3 border border-gray-700"><?= $row['id'] ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= htmlspecialchars($row['full_name']) ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= htmlspecialchars($row['email']) ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= htmlspecialchars($row['facility_name']) ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= htmlspecialchars($row['sport']) ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= htmlspecialchars($row['time_slot']) ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= $row['booking_date'] ?></td>
                                <td class="px-4 py-3 border border-gray-700"><?= htmlspecialchars($row['addons']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center py-4 text-gray-400">No bookings found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>