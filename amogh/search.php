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
// Existing SQL query
$sql = "SELECT * FROM users ORDER BY Id DESC";
$result = $conn->query($sql);

// Check if a search query is present
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM users WHERE Name LIKE '%$search%' ORDER BY Id DESC";
    $result = $conn->query($sql);
    header("Location: admin.php");
}
?>
