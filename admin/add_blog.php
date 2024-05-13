<?php include '../includes/config.php';?>
<?php include 'header.php'?>

<?php
if (isset($_SESSION['user_data'])) {
    $author_id = $_SESSION['user_data']['0'];
}

$query4 = "SELECT * FROM category";
$result4 = mysqli_query($conn, $query4);

?>

<div class="container">
    <h5 class="mb-2 text-gray-800">Blogs</h5>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="font-weight-bold text-primary mt-2">Publish Blog/Articles</h6>
                </div>

                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" name="blog_title" placeholder="Title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Body</label>
                            <textarea name="blog_body" id="blog" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="blog_image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <select name="category" id="" class="form-control" required>
                                <option>Select Category</option>
                                <?php while ($cats = mysqli_fetch_assoc($result4)) {?>
                                <option value="<?=$cats['cat_id']?>"><?=$cats['cat_name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="add_blog" value="ADD" class="btn btn-primary">
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'?>

<?php
if (isset($_POST['add_blog'])) {
    // Sanitize and validate input
    $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $blog_body = mysqli_real_escape_string($conn, $_POST['blog_body']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    if (empty($blog_title) || empty($blog_body) || empty($category)) {
        echo ("<script>alert('Please fill in all fields');</script>");
        exit; // Stop execution if required fields are empty
    }

    if (isset($_FILES['blog_image']) && !empty($_FILES['blog_image'])) {
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
                    // File uploaded successfully, now you can use $destination as $blog_image
                    $blog_image = $destination;
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
    } else {
        echo ("<script>alert('No file uploaded');</script>");
        exit; // Stop execution if no file uploaded
    }

    // Perform the database insertion
    $query5 = "INSERT INTO blog (blog_title, blog_body, blog_image, category, author_id) VALUES ('$blog_title', '$blog_body', '$blog_image', '$category', '$author_id')";
    $result5 = mysqli_query($conn, $query5);

    if ($result5) {
        echo ("<script>alert('Blog uploaded! ');window.location.href = 'add_blog.php';</script>");
    } else {
        echo ("<script>alert('Blog failed! ');window.location.href = 'add_blog.php';</script>");
    }
}
?>