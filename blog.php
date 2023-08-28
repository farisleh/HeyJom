<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login_page/index.html");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Blog Posts</h1>
        <a href="add_post_form.php" class="btn btn-primary mt-2">Add New Post</a>
        <a href="add_category_form.php" class="btn btn-success mt-2">Add New Category</a>
        <div class="text-center mt-3">
        <select class="form-control mb-3" id="category-dropdown">
        <option value="">All Categories</option>
        <?php include 'api/get_categories.php'; ?>
        </select>
    </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody id="blog-posts">
            </tbody>
        </table>
        <div class="text-center mt-3">
            <button class="btn btn-primary" id="load-more-btn">Load More</button>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="utils/dynamic_content.js"></script>
</body>
</html>
