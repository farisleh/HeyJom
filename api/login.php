<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "blog");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT id, password FROM users WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            header("Location: ../blog.php");
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "Invalid credentials.";
    }
}

?>