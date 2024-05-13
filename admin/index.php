<?php
include 'header.php';

// Check if user is logged in
if (isset($_SESSION['user_data'])) {
    $userID = $_SESSION['user_data']['0'];
}

// pagination

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$limit = 5;
$offset = ($page - 1) * $limit;

?>
<style>
.bold-left {
    text-align: left;
    font-weight: bold;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid" id="adminpage">
    <!-- Page Heading -->
    <h5 class="mb-2 text-gray-800">Blog Posts</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
            <div>
                <a href="add_blog.php">
                    <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
                </a>
            </div>
            <div>
                <form class="navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>blog_id</th>
                            <th>blog_title</th>
                            <th>Category</th>
                            <th>Author_name</th>
                            <th>publish_date</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
// Fetch blog posts with category and author details
$query = "SELECT blog.*, category.cat_name, users.username
                                FROM blog
                                LEFT JOIN category ON blog.category = category.cat_id
                                LEFT JOIN users ON blog.author_id = users.user_id
                                WHERE user_id='$userID'
                                ORDER BY blog.publish_date DESC
                                limit $offset,$limit";

$result = mysqli_query($conn, $query);
// $count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                        <tr>
                            <td><?=++$offset?></td>
                            <td class="bold-left"><?=$row['blog_title']?></td>
                            <td><?=$row['cat_name']?></td>
                            <td><?=$row['username']?></td>
                            <td><?=date('d-M-Y', strtotime($row['publish_date']))?></td>
                            <td>
                                <a href="edit_blogs.php?id=<?=$row['blog_id'];?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete the record?')">
                                    <input type="hidden" name="blog_id" value="<?=$row['blog_id'];?>">
                                    <input type="submit" name="delete_blog" value="Delete"
                                        class="btn btn-sm btn-danger">
                                </form>
                            </td>
                        </tr>
                        <?php
}
} else {
    echo "<tr><td colspan='6'>No blog posts found.</td></tr>";
}
?>
                    </tbody>
                </table>
                <!-- pagination begin -->

                <?php

$pagination = "SELECT * FROM blog WHERE author_id='$userID'";
$run_q = mysqli_query($conn, $pagination);
$total = mysqli_num_rows($run_q);
$pages = ceil($total / $limit);

if ($total > $limit) {?>
                <ul class="pagination pt-2 pb-5">
                    <?php for ($i = 1; $i <= $pages; $i++) {?>
                    <li class="page-item <?=($i == $page) ? $active = 'active' : '';?>">
                        <a href="index.php?page=<?=$i?>" class="page-link"><?=$i?></a>
                    </li>
                    <?php }?>
                </ul>
                <?php
}?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<?php include 'footer.php'?>

<?php
if (isset($_POST['delete_blog'])) {
    $blog_id = $_POST['blog_id'];
    $image = "upload/" . $_POST['image'];
    $delete_query = "DELETE FROM blog WHERE blog_id='$blog_id'";
    $run_delete = mysqli_query($conn, $delete_query);
    if ($run_delete) {
        unlink($image);
        echo "<script>alert('Blog has been deleted!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Failed to delete blog. Please try again.'); window.location.href = 'index.php';</script>";
    }
}
?>