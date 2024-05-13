<?php
// Start session and include configuration
include '../includes/config.php';
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_data']) || $_SESSION['user_data'][2] !== '1') {
    header("location: index.php"); // Redirect to another page
    exit; // Stop further execution
}
?>
<div class="container">
    <h5 class="mb-2 text-gray-800">Categories</h5>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="font-weight-bold text-primary mt-2">Add categories</h6>
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <input type="text" name="cat_name" placeholder="Category Name" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="add_cat" value="ADD" class="btn btn-primary">
                            <a href="categories.php" class="btn btn-secondary">Back</a>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'?>



<?php
if (isset($_POST['add_cat'])) {
    /* echo "<h1>PRESS</h1>"; */
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
    /* echo $cat_name; */
    $query = "SELECT * FROM category WHERE cat_name='$cat_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    if ($row) {
        echo ("<script>alert('category already exist! ');</script>");
    } else {
        $query1 = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
        $result1 = mysqli_query($conn, $query1);

        if ($result1) {
            echo ("<script>alert('category successfully edited! ');</script>");
        } else {
            /* echo "failed!"; */
            die("<script>alert('Failed: " . mysqli_error($conn) . "');</script>");

        }
    }

}

?>