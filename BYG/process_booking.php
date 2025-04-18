<?php
session_start();
include 'db_connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arena_id = isset($_POST['arena_id']) ? intval($_POST['arena_id']) : 0;
    $sport = isset($_POST['sport']) ? trim($_POST['sport']) : '';
    $time_slot = isset($_POST['time_slot']) ? trim($_POST['time_slot']) : '';
    $facility_name = isset($_POST['facility_name']) ? trim($_POST['facility_name']) : "Unknown Facility";
    $user_id = $_SESSION['user_id'] ?? null;
    $addons = isset($_POST['addons']) ? implode(", ", $_POST['addons']) : null; 
    // Ensure user is logged in
    if (!$user_id) {
        die("❌ Error: User is not logged in. Please log in first.");
    }

    // Ensure all required fields are present
    if (empty($arena_id) || empty($sport) || empty($time_slot) || empty($facility_name)) {
        die("❌ Error: All fields are required.");
    }

    // Fetch the price from sports_pricing table
    $priceQuery = "SELECT price FROM sports_pricing WHERE arena_id = ? AND sport_name = ?";
    $priceStmt = mysqli_prepare($conn, $priceQuery);
    mysqli_stmt_bind_param($priceStmt, "is", $arena_id, $sport);
    mysqli_stmt_execute($priceStmt);
    $priceResult = mysqli_stmt_get_result($priceStmt);
    $priceRow = mysqli_fetch_assoc($priceResult);
    $price = $priceRow ? floatval($priceRow['price']) : 0.00;

    // $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.00;
    $query = "INSERT INTO bookings (user_id, arena_id, facility_name, sport, time_slot, addons, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iissssd", $user_id, $arena_id, $facility_name, $sport, $time_slot, $addons, $price);

    if (mysqli_stmt_execute($stmt)) {
        echo "✅ Booking Successful!";
        header("Location: my_bookings.php"); // Redirect to My Bookings page
        exit();
    } else {
        echo "❌ Booking Failed: " . mysqli_error($conn);
    }
}
?>