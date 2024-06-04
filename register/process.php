<?php
// Include database connection settings
include('../reusableCodes/connectdb.php');

if(isset($_POST['signup'])){
	/* capture values from HTML form */
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phoneno = $_POST['phonenum'];
	$email = $_POST['email'];
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$level_id = 2;
	// check if username already exists
	$sql0 = "SELECT username FROM users WHERE username = '$user_name'";
	$query0 = mysqli_query($conn, $sql0) or die ("Error: " . mysqli_error($conn));
	$row0 = mysqli_num_rows($query0);
	
	if($row0 != 0){
		header('Location: ../register/regRecExist.php');
		//echo "Record is existed";
	}else{
		// Fetch and save file into a folder
		// Handle file upload
		$path = '..\\userPictures\\';
		$tmplocation = $_FILES["file"]["tmp_name"];

		$newFileName = $name; 
		$newFileExtension = ".jpg"; 
		$imageName=$newFileName.$newFileExtension;
		// Save new picture first
		if (!empty($_FILES["file"]["name"])) {
			if (!move_uploaded_file($tmplocation, $path . $newFileName . $newFileExtension)) {
				die("Error uploading file.");
			}
		}

		/* execute SQL INSERT command */
		$sql2 = "INSERT INTO users (username, name,password,gender,address,email,phone_Num,picture,level_id)
		VALUES ('" . $user_name . "', '" . $name . "', '" . $password . "', '" . $gender . "', '" . $address . "', '" . $email . "', '" . $phoneno . "', '" . $imageName . "', '" . $level_id . "')";
		
		mysqli_query($conn, $sql2) or die ("Error: " . mysqli_error($conn));
		/* rediredt to respective page */
		// Close Connection
		mysqli_close($conn);
		header('Location: ../login/login.php');
		//echo "Data has been saved";
	}
}// close if isset()
	/* close db connection */
	mysqli_close($conn);
?>
