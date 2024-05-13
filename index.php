<?php include 'includes/header.php';
include 'includes/config.php';

// pagination

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$limit = 5;
$offset = ($page - 1) * $limit;

// ----------------------------

$query = "SELECT * FROM blog LEFT JOIN category ON blog.category=category.cat_id LEFT JOIN users ON blog.author_id=users.user_id
    ORDER BY blog.publish_date DESC limit $offset,$limit";

$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-8">
            <?php
if ($row) {
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card shadow">
                <div class="card-body d-flex blog_flex">
                    <div class="flex-part1">
                        <a href=""><img src="admin/<?=$rows['blog_image'];?>" alt="<?=$rows['blog_image'];?>"></a>
                    </div>
                    <div class="flex-grow-1 flex-part2">
                        <a href="" id="title"><?=ucfirst($rows['blog_title']);?></a>
                        <p>
                            <a href="" id="body"><?=strip_tags(substr($rows['blog_body'], 0, 400));?></a> <span><br>
                                <a href="single_post.php?id=<?=$rows['blog_id'];?>"
                                    class="btn btn-sm btn-outline-primary">Continue Reading</a></span>
                        </p>
                        <ul>
                            <li class="me-2"><a href=""><span><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></span><?=$rows['username'];?></a></li>
                            <li class="me-2"><a href=""><span><i class="fa fa-calendar-o"
                                            aria-hidden="true"></i></span><?=date('d-M-Y', strtotime($rows['publish_date']));?></a>
                            </li>
                            <li><a href="category.php?id=<?=$rows['cat_id']?>"><span><i class="fa fa-tag"
                                            aria-hidden="true"></i></span><?=$rows['cat_name'];?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
}
} else {
    echo "<p>No blog posts found.</p>";
}
?>



            <!-- pagination begin -->

            <?php

$pagination = "SELECT * FROM blog";
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
        <?php include 'sidebar.php';?>
    </div>
</div>

<?php include 'includes/footer.php';

// if ($i == $page) {
//     echo $active = 'active';
// } else {
//     echo '';
// }

?>