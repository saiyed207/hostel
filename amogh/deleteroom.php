<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amogh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $roomId = $_GET["id"];

    // Perform delete query based on the room ID
    $deleteQuery = "DELETE FROM house WHERE id = $roomId";
    
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Room deleted successfully.";
        
        // Redirect to house1.php
        header("Location: house1.php");
        exit();
    } else {
        echo "Error deleting room: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
