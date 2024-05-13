<?php
// For Security purpose
session_start();
include 'includes/config.php'; // Include config file at the top
include 'includes/header.php';

if (isset($_SESSION['user_data'])) {
    header("location:http://localhost/PHP/basic/blog_project/admin/index.php");
    exit(); // Stop further execution
}

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, sha1($_POST['password']));

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_num_rows($result);
    if ($data) {
        $row = mysqli_fetch_assoc($result);
        $user_data = array($row['user_id'], $row['username'], $row['role']);
        $_SESSION['user_data'] = $user_data;
        header("location:admin/index.php");
        exit(); // Stop further execution
    } else {
        $_SESSION['error'] = "Invalid email/password";
        header("location:login.php");
        exit(); // Stop further execution
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-xl-5 col-md-4 m-auto p-5 mt-5 bg-info">
            <form action="" method="POST">
                <p class="text-center">Blog! Login your account</p>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="login_btn" class="btn-primary" value="Login">
                </div>
                <?php
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    echo "<p class='bg-danger p-2 text-white'>" . $error . "</p>";
    unset($_SESSION['error']);
}
?>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'?>