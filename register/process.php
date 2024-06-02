<?php
// Include database connection settings
include('../include/dbconn.php');

if(isset($_POST['signup'])){
	/* capture values from HTML form */
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phoneno = $_POST['phonenum'];
	$email = $_POST['email'];
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$level = "user";

	$sql0 = "SELECT username FROM user WHERE username = '$user_name'";
	$query0 = mysqli_query($conn, $sql0) or die ("Error: " . mysqli_error($conn));
	$row0 = mysqli_num_rows($query0);
	
	if($row0 != 0){
	header('Location: ../register/regRecExist.php');
	//echo "Record is existed";
	}
	else{
	/* execute SQL INSERT command */
	$sql2 = "INSERT INTO user (username, password,name,gender,address,phonenum,email,level_id)
	VALUES ('" . $user_name . "', '" . $password . "', '" . $name . "', '" . $gender . "', '" . $address . "', '" . $phoneno . "', '" . $email . "', '" . $level_id . "')";
	
	mysqli_query($conn, $sql2) or die ("Error: " . mysqli_error($conn));
	/* rediredt to respective page */
	header('Location: ../login/login.php');
	//echo "Data has been saved";
	}
}// close if isset()
	/* close db connection */
	mysqli_close($conn);
?>
