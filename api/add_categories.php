<?php
$mysqli = new mysqli("localhost", "root", "", "blog");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    
    $insertQuery = "INSERT INTO categories (name) VALUES ('$name')";
    
    if ($mysqli->query($insertQuery) === TRUE) {
        echo "$name added successfully.";
        header("Location: ../blog.php");
    } else {
        echo "Error: " . $insertQuery . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>