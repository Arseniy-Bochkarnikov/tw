<?php
require_once 'database.php';

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password match
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password!";
    }
}
?>
