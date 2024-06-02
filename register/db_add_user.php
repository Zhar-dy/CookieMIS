<?php 
include('../reusableCodes/connectdb.php');

// Initialize an empty array to hold sanitized POST values
$valuearr = [];

// Sanitize and collect POST data
foreach ($_POST as $sForm => $value) {
    $postedValue = htmlspecialchars(stripslashes($value), ENT_QUOTES);
    $valuearr[] = $postedValue;
}

// Handle file upload
$path = '\xampp\htdocs\CookieMIS\images/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];

if (!empty($pic)) {
    if (!move_uploaded_file($tmplocation, $path . $pic)) {
        die("Error uploading file.");
    }
}

// Echoing values for debugging purposes
echo $valuearr[0].'<br>'.$pic.'<br>'.$valuearr[1].'<br>'.$valuearr[2].'<br>'.$valuearr[3].'<br>'.$valuearr[4].'<br>'.$valuearr[5].'<br>'.$valuearr[6];

// Check if username already exists
$sql0 = "SELECT username FROM user WHERE username = '$valuearr[5]'";
$query0 = mysqli_query($conn, $sql0) or die ("Error: " . mysqli_error($conn));
$row0 = mysqli_num_rows($query0);

if($row0 != 0){
    header('Location: ../register/regRecExist.php');
    echo "<b>Record is existed</b>";
} else {
    // Execute SQL INSERT command
    $sql2 = "INSERT INTO user (username, name, password, gender, address,email, phonenum, picture, level_id)
    VALUES ('$valuearr[0]', '$valuearr[1]','$valuearr[2]', '$valuearr[3]', '$valuearr[4]', '$valuearr[5]', '$valuearr[6]', '$pic', '$valuearr[7]')";
    
    mysqli_query($conn, $sql2) or die ("Error: " . mysqli_error($conn));
    // Redirect to the respective page
    header('Location: ../index.php');
    //echo "Data has been saved";
}

// Close db connection
mysqli_close($conn);
?>