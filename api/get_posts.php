<?php
$conn = mysqli_connect("localhost", "root", "", "blog");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;

$sql = "SELECT posts.title, categories.name AS category_name, posts.content 
        FROM posts 
        INNER JOIN categories ON posts.category_id = categories.id";

if ($category_id !== null) {
    $sql .= " WHERE categories.id = $category_id";
}

$sql .= " ORDER BY posts.id DESC LIMIT $offset, $limit";

$result = mysqli_query($conn, $sql);

$posts = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($posts);
?>
