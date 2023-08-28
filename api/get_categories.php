<?php
$conn = mysqli_connect("localhost", "root", "", "blog");
$sql = "SELECT id, name FROM categories";
$categoryResult = mysqli_query($conn, $sql);

while ($category = mysqli_fetch_assoc($categoryResult)) {
    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
}
mysqli_close($conn);
?>
