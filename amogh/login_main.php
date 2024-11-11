<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amogh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
       
        $_SESSION["login_error"] = "Invalid username or password";
        header("Location: login1.php");
        exit();
    }
} else {
    $_SESSION["login_error"] = "Invalid username or password";
    
    exit();
}
?>
