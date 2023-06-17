<?php
require_once 'database.php';

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Username or email already exists!";
    } else {
        // Insert user into the database
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
