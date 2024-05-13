<?php
include '../includes/config.php';
include 'header.php';

if (isset($_SESSION['user_data'])) {
    $author_id = $_SESSION['user_data'][0];
}

$query4 = "SELECT * FROM category";
$result4 = mysqli_query($conn, $query4);

if (isset($_POST['edit_blog'])) {
    $blogID = $_GET['id'];
    $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $blog_body = mysqli_real_escape_string($conn, $_POST['blog_body']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // Check if a new image is uploaded
    if (isset($_FILES['blog_image']) && !empty($_FILES['blog_image']['name'])) {
        // Handle image upload
        $filename = $_FILES['blog_image']['name'];
        $tmp_name = $_FILES['blog_image']['tmp_name'];
        $size = $_FILES['blog_image']['size'];
        $image_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'jpeg', 'png', 'gif', 'jfif', 'avif', 'webp'];

        // Generate a unique filename to avoid conflicts
        $destination = "../admin/upload/" . uniqid() . "_" . $filename;

        if (in_array($image_ext, $allow_type)) {
            if ($size <= 2000000) {
                if (move_uploaded_file($tmp_name, $destination)) {
                    // File uploaded successfully, update image path in the database
                    $query_update_image = "UPDATE blog SET blog_image = '$destination' WHERE blog_id = '$blogID'";
                    mysqli_query($conn, $query_update_image);
                } else {
                    echo "Failed to upload file.";
                    exit; // Stop execution if file upload fails
                }
            } else {
                echo ("<script>alert('File size exceeds limit');</script>");
                exit; // Stop execution if file size exceeds limit
            }
        } else {
            echo ("<script>alert('File type not supported');</script>");
            exit; // Stop execution if file type is not supported
        }
    }

    // File upload handling code goes here (if needed)

    $query_update = "UPDATE blog
                        SET blog_title = '$blog_title', blog_body = '$blog_body', category = '$category'
                        WHERE blog_id = '$blogID'";

    if (mysqli_query($conn, $query_update)) {
        echo ("<script>alert('category successfully Updated! ');window.location.href = 'index.php';</script>");
    } else {
        echo ("<script>alert('category successfully Updated! ');window.location.href = 'categories.php';</script>");
    }
}

$blogID = $_GET['id'];
$query7 = "SELECT blog.*, category.cat_name, users.username
                FROM blog
                LEFT JOIN category ON blog.category = category.cat_id
                LEFT JOIN users ON blog.author_id = users.user_id
                WHERE blog_id='$blogID'";

$result7 = mysqli_query($conn, $query7);
$row = mysqli_fetch_assoc($result7);
?>

<div class="container">
    <h5 class="mb-2 text-gray-800">Blogs</h5>
    <div class="row">
        <div class="col-xl-8 col-lg-6">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="font-weight-bold text-primary mt-2">Edit Blog/Articles</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" name="blog_title" placeholder="Title" value="<?=$row['blog_title']?>"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Body</label>
                            <textarea name="blog_body" id="blog" cols="30" rows="2"
                                class="form-control"><?=$row['blog_body']?></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="blog_image" class="form-control" required>
                            <?php
$imagePath = "" . $row['blog_image'];

if (file_exists($imagePath)) {
    echo "<img src=\"$imagePath\" class=\"border\">";
} else {
    echo "Image file not found: $imagePath";
}
?>
                        </div>
                        <div class="mb-3">
                            <select name="category" id="" class="form-control" required>
                                <?php
while ($cats = mysqli_fetch_assoc($result4)) {
    echo "<option value=\"{$cats['cat_id']}\"";
    echo ($row['category'] == $cats['cat_id']) ? " selected" : "";
    echo ">{$cats['cat_name']}</option>";
}
?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="edit_blog" value="UPDATE" class="btn btn-primary">
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>