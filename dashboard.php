<?php
// Include the database.php file
require_once 'database.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve the user's tweets
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tweets WHERE user_id='$user_id'";
$result = $conn->query($sql);

// Display the user's tweets
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['tweet_content'] . "<br>";
    }
} else {
    echo "No tweets found.";
}
?>
