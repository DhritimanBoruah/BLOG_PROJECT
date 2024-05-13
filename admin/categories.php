<?php include '../includes/config.php';


// need to fix it
// if ($role != 1) {
//     header("location:index.php");
// }

// pagination

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$limit = 3;
$offset = ($page - 1) * $limit;

?>
<?php
// For Security purpose

// session_start();
// if(!isset($_SESSION['user_data'])){
//    header("location:http://localhost/PHP/basic/blog_project/login.php");
//    exit;}
?>


<?php include 'header.php'?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-2 text-gray-800">Categories</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
            <div>
                <a href="add_cat.php">
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
                            <th>Sr.No</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$query3 = "SELECT * FROM category LIMIT $offset, $limit";
$result3 = mysqli_query($conn, $query3);
$rows = mysqli_num_rows($result3);
// $count = 0;
if ($rows) {
    while ($row = mysqli_fetch_assoc($result3)) {
        ?>
                        <tr>
                            <td><?=++$offset?></td>
                            <td><?=$row['cat_name'];?></td>
                            <td>
                                <a href="edit_categories.php?id=<?=$row['cat_id'];?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete the record?')">
                                    <input type="hidden" name="catID" value="<?=$row['cat_id'];?>">
                                    <input type="submit" name="delete_cat" value="Delete" class="btn btn-sm btn-danger">
                                </form>
                            </td>
                        </tr>
                        <?php
}
} else {
    ?>
                        <tr>
                            <td colspan="4">No Record Found!</td>
                        </tr>

                        <?php
}
?>
                    </tbody>
                </table>

                <!-- pagination begin -->

                <?php

$pagination = "SELECT * FROM category";
$run_q = mysqli_query($conn, $pagination);
$total = mysqli_num_rows($run_q);
$pages = ceil($total / $limit);

if ($total > $limit) {?>
                <ul class="pagination pt-2 pb-5">
                    <?php for ($i = 1; $i <= $pages; $i++) {?>
                    <li class="page-item <?=($i == $page) ? $active = 'active' : '';?>">
                        <a href="categories.php?page=<?=$i?>" class="page-link"><?=$i?></a>

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

<?php
if (isset($_POST['delete_cat'])) {
    $id = $_POST['catID'];
    $delete = "DELETE FROM category WHERE cat_id='$id'";
    $run = mysqli_query($conn, $delete);
    if ($run) {
        echo "<script>alert('Category has been deleted!'); window.location.href = 'categories.php';</script>";
    } else {
        echo "<script>alert('Failed! Please try again!!'); window.location.href = 'categories.php';</script>";
    }
}
?>







<?php include 'footer.php'?>