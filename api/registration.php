<?php
$mysqli = new mysqli("localhost", "root", "", "blog");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if ($mysqli->query($query) === TRUE) {
            echo "Registration successful. You can now <a href='../login_page/index.html'>login</a>.";
        } else {
            echo "Error: " . $mysqli->error;
        }
    }
}
?>
