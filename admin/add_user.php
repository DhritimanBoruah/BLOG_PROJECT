<?php

// Start session and include configuration
include '../includes/config.php';
include 'header.php';

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_data']) || $_SESSION['user_data'][2] !== '1') {
    header("location: index.php"); // Redirect to another page
    exit; // Stop further execution
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-5 m-auto bg-info p-4">
            <div>
                <?php
if (!empty($error)) {
    /* echo "<p class='bg-danger text-white p-2'>".$error."</p>"; */
    /* echo "<script>alert('$error');</script>"; */
}
?>
            </div>
            <form action="" method="post">
                <p class="text-center">CREATE NEW USER</p>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="username"
                        value="<?php echo isset($username) ? $username : ''; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="email"
                        value="<?php echo isset($email) ? $email : ''; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <select id="" class="form-control" name="role" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="co-admin">Co-admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" name="add_user" class="btn btn-primary" value="Create">
                    <a href="users.php" class="btn btn-secondary">Back</a>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include 'footer.php'?>

<?php
if (isset($_POST['add_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $role = isset($_POST['role']) ? mysqli_real_escape_string($conn, $_POST['role']) : '';

    $error = "";

    if (strlen($username) < 4 || strlen($username) > 100) {
        $error = "Username must be between 4 and 100 characters";
    } elseif (strlen($password) < 4) {
        $error = "Password must be at least 4 characters long";
    } elseif ($password != $cpassword) {
        $error = "Passwords don't match";
    } else {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $error = "Email already exists";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query1 = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
            $result1 = mysqli_query($conn, $query1);
            if ($result1) {
                echo "<script>alert('User added successfully!');window.location.href = 'add_user.php';</script>";
            } else {
                echo "<script>alert('Failed to add user.');window.location.href = 'add_user.php';</script>";
            }
        }
    }

    // Display error message if any
    if (!empty($error)) {
        echo "<script>alert('$error');</script>";
    }
}
?>