<?php
// Initialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');

if (isset($_GET['delete'])) {
    $userID = $_GET['delete'];
    $sql = "DELETE FROM users WHERE user_ID = $userID";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "Successfully deleted User";
        header("location:upd_User.php");
    } else {
        echo "An error occurred!";
    }
    exit();
}

if (isset($_GET['update'])) {
    $userID = $_GET['update'];
    $sql = "SELECT * FROM users WHERE user_ID = $userID";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $userData = mysqli_fetch_array($query);
    } else {
        echo "User not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php'; ?>
</head>
<body>
    <!-- Header File -->
    <?php include '../reusableCodes/headerStaff.php'; ?>
    <?php if (!isset($_SESSION['name'])) {
        header('Location: index.php');
    } ?>

    <div class="update_profile_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="update_text">Update Profile</h1>
                    <form method="POST" action="saveUserStaff.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $userData['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $userData['phone_Num']; ?>">
                        </div>

                        <p>Note: You will need to log in again after updating your account</p>
                        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                        <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
                </div>
                <div class="col-md-6">
                    <h1 class="update_text">Update Picture</h1>
                    <div class="form-group">
                        <label for="picture">Picture:</label>
                        <input type="file" class="form-control-file" id="picture" name="file" required>
                        <img src="../userPictures/<?php echo $userData['picture']; ?>" width="130" height="130">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address" class="form-control" required><?php echo $userData['address']; ?></textarea>
                    </div>
                </div>
                    </form>
            </div>
        </div>
    </div>


</body>
</html>
