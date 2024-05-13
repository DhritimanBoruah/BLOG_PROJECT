<?php include '../includes/config.php';

// pagination

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$limit = 3;
$offset = ($page - 1) * $limit;

?>




<?php include 'header.php'?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-2 text-gray-800">Users</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
            <div>
                <a href="add_user.php">
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$query = "SELECT * FROM users LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
// $count = 0;
if ($row) {
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                        <tr>
                            <td><?=++$offset?></td>
                            <td><?=$rows['username']?></td>
                            <td><?=$rows['email']?></td>
                            <td><?=$rows['role'] == 1 ? 'Admin' : 'Co-admin';?></td>
                            <td>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Are you sure,You want to delete the User?')">
                                    <input type="hidden" name="user_id" value="<?=$rows['user_id'];?>">
                                    <input type="submit" name="delete_user" value="Delete"
                                        class="btn btn-sm btn-danger">
                                </form>
                            </td>
                        </tr>


                        <?php
}
} else {
    echo "<tr><td colspan='6'>No User posts found.</td></tr>";
}
?>
                    </tbody>
                </table>

                <!-- pagination begin -->

                <?php

$pagination = "SELECT * FROM users";
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
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $delete_query = "DELETE FROM users WHERE user_id='$user_id'";
    $run_delete = mysqli_query($conn, $delete_query);
    if ($run_delete) {
        echo "<script>alert('User has been deleted!'); window.location.href = 'users.php';</script>";
    } else {
        echo "<script>alert('Failed to delete User. Please try again.'); window.location.href = 'users.php';</script>";
    }
}

?>




<?php include 'footer.php'?>