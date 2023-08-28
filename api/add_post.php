<?php
$mysqli = new mysqli("localhost", "root", "", "blog");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $category_id = $_POST["category_id"];
    $content = $_POST["content"];
    
    $insertQuery = "INSERT INTO posts (title, category_id, content) VALUES ('$title', '$category_id', '$content')";
    
    if ($mysqli->query($insertQuery) === TRUE) {
        echo "$title added successfully.";
        header("Location: ../blog.php");
    } else {
        echo "Error: " . $insertQuery . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>