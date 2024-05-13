<?php include 'includes/header.php';
    include 'includes/config.php';

    $id = $_GET['id'];
    if(empty($id)){
        header("location:index.php");
        }
    $query = "SELECT * FROM blog LEFT JOIN category ON blog.category=category.cat_id LEFT JOIN users ON blog.author_id=users.user_id 
        WHERE cat_id='$id' ORDER BY blog.publish_date DESC";

    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-8">
            <?php 
            if($row) {
                while($rows=mysqli_fetch_assoc($result)) {
            ?>
            <div class="card shadow">
                <div class="card-body d-flex blog_flex">
                    <div class="flex-part1">
                        <a href=""><img src="admin/<?= $rows['blog_image']; ?>" alt="<?= $rows['blog_image']; ?>"></a>
                    </div>
                    <div class="flex-grow-1 flex-part2">
                          <a href="" id="title"><?= ucfirst($rows['blog_title']); ?></a>
                        <p>
                          <a href="" id="body"><?= strip_tags(substr($rows['blog_body'],0,400)); ?></a> <span><br>
                          <a href="single_post.php?id=<?= $rows['blog_id']; ?>" class="btn btn-sm btn-outline-primary">Continue Reading</a></span>
                        </p>
                        <ul>
                            <li class="me-2"><a href=""><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><?= $rows['username']; ?></a></li>
                            <li class="me-2"><a href=""><span><i class="fa fa-calendar-o" aria-hidden="true"></i></span><?= date('d-M-Y',strtotime($rows['publish_date'])); ?></a></li>
                            <li><a href=""><span><i class="fa fa-tag" aria-hidden="true"></i></span><?= $rows['cat_name']; ?></a></li>
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
        </div>
        <?php include 'sidebar.php'; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
