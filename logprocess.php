<?php
 $email = $_POST["email"];
 $password = $_POST["password"];

 if(empty($email) || empty($password)) {
    echo '<script>alert("Please fill all fields")</script>';
    include("login.php");
}

$conn = mysqli_connect("localhost", "someuser", "somepassword", "doctor");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);


$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    // Login successful
    include("dashboard.php");
    exit();
    
} else {
    // Login failed
    echo '<script>alert("Invalid Username or Password")</script>';
    include("login.php");
    exit();
}
