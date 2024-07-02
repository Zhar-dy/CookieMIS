<?php
// Initialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Capture values from HTML form
    $userID = $_POST['userID'];
    $tempusername = $_POST['name'];
    $tempemail = $_POST['email'];
    $tempphoneNum = $_POST['phone'];
    $temppassword = $_POST['password'];
    $tempaddress = $_POST['address'];

    $sql = "SELECT * FROM users WHERE user_ID = $userID";
    $query = mysqli_query($conn, $sql);
    $tempArray = mysqli_fetch_array($query);

    $username = !empty($tempusername) ? $tempusername : $tempArray[2];
    $email = !empty($tempemail) ? $tempemail : $tempArray[6];
    $address = !empty($tempaddress) ? $tempaddress : $tempArray[5];
    $phone = !empty($tempphoneNum) ? $tempphoneNum : $tempArray[7];
    $password = !empty($temppassword) ? md5(md5($temppassword)) : $tempArray[3];

    $fileName = $_SESSION['picture'];
    if (!empty($_FILES['file']['name'])) {
        $uploadedFile = $_FILES['file'];
        $fileLocation = $uploadedFile['tmp_name'];
        $originalFileName = $uploadedFile['name'];
        $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $newLocation = "../userPictures/" . $tempArray[1] . "." . $fileExtension;
            $fileName = $tempArray[1] . "." . $fileExtension;

            if (move_uploaded_file($fileLocation, $newLocation)) {
                echo "File successfully uploaded and saved as: $fileName";
            } else {
                echo "Error while saving the file.";
            }
        } else {
            echo "Error: Invalid file extension. Allowed extensions are: " . implode(', ', $allowedExtensions);
        }
    }

    $sql2 = "UPDATE users SET name = '$username', password = '$password', email = '$email', address = '$address', picture = '$fileName', phone_Num = '$phone' WHERE user_ID = '$userID'";
    $query = mysqli_query($conn, $sql2);

    if ($query) {
        echo "<script>alert('Account is updated successfully!')</script>";
        echo "Successfully Updated account";
    } else {
        echo "<script>alert('An error occurred!')</script>";
        echo "Unsuccessfully Updated account";
    }

    echo "<br>Process finished";
    header('Location: upd_User.php');
}
mysqli_close($conn);
?>
