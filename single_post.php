<?php include 'includes/header.php';
      include 'includes/config.php';
      
      
        $id=$_GET['id'];
        if(empty($id)){
            header("location:index.php");
        }
        $query1 = "SELECT * FROM blog WHERE blog_id='$id'";
        $result1=mysqli_query($conn,$query1);
        $post=mysqli_fetch_assoc($result1);
     
?>


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <div id="single_img" >
                        <?php $img= $post['blog_image'];  ?>
                        <div style="text-align: center;>
                            <a href="">
                            <img src="admin/<?= $img ?>" alt="" style="width: 300px;">
                            </a>
                        </div>
                    </div>
                    <hr>
                    
                    <div>
                        <h1><?= $post['blog_title'];  ?></h1>
                        <p><?= $post['blog_body'];  ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'sidebar.php'; ?>
    </div>
</div>


<?php include 'includes/footer.php';?>
