<?php
// Inialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');

if(isset($_POST['update'])){
	/* capture values from HTML form */
	$tempusername = $_POST['name'];
	$tempemail = $_POST['email'];
	$tempphoneNum = $_POST['phone'];
	$temppassword = $_POST['password'];
	$tempaddress = $_POST['address'];
	if(!empty($tempusername)){
		$username = $tempusername;
	}else{
		$username = $_SESSION['username'];
	}
	if(!empty($tempemail)){
		$email = $tempemail;
	}else{
		$email = $_SESSION['email'];
	}
	if(!empty($tempphoneNum)){
		$phone= $tempphoneNum;
	}else{
		$phone=$_SESSION['phone_Num'];
	}
	if(!empty($temppassword)){
		$password = $temppassword;
		md5($password);
		md5($password);
	}else{
		$password=$_SESSION['password'];
	}
	if(!empty($tempaddress)){
		$address= $tempaddress;
	}else{
		$address=$_SESSION['address'];
	}
	
	
	$sql= "SELECT * FROM users WHERE username= '".$_SESSION['username']."' AND password= '".$_SESSION['password']."'";
	$query = mysqli_query($conn, $sql);
	$tempArray = mysqli_fetch_array($query);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$uploadedFile = $_FILES['file'];
		print_r($uploadedFile);
		$fileLocation = $uploadedFile['tmp_name'];
		// Might want to add a js time stamp to keep things clean
		$originalFileName = $uploadedFile['name']; // Get the original filename
		$fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
	
		// Define allowed file extensions
		$allowedExtensions = ['jpg', 'jpeg', 'png'];
		$newLocation = "../userPictures/".$tempArray[1].".".$fileExtension;
		$fileName = $tempArray[1].".".$fileExtension;
		echo $tempArray[1]."<br>";
		// Validate file extension
		if (!in_array($fileExtension, $allowedExtensions)) {
			echo "Error: Invalid file extension. Allowed extensions are: " . implode(', ', $allowedExtensions);
			// Handle the error (e.g., display a message to the user)
		} else {
			if (move_uploaded_file($fileLocation, $newLocation)) {
				echo "File successfully uploaded and saved as: $fileName";
			} else {
				echo "Error while saving the file.";
			}
		}
	}
	if(!empty($fileName)){
		$pic= $fileName;
	}else{
		$pic=$_SESSION['picture'];
	}
	$sql = "UPDATE users SET name = '".$username."', password = '".$password."', email = '".$email."', phone_Num = '".$phone."', picture = '".$pic."', address = '".$address."' WHERE user_ID = '".$tempArray[0]."';";
	echo $sql;
	$query = mysqli_query($conn, $sql);
	if($query){
		$sql= "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
		$query = mysqli_query($conn, $sql);
		$d = mysqli_fetch_array($query);
		//$username= $r['username'];
		//$password= $r['password'];
		//$level= $r['level_id'];
		unset($_SESSION["picture"]);
		// Set session for the user
		$_SESSION["user_ID"] = $d[0];
		$_SESSION["username"] = $d[1];
		$_SESSION["name"] = $d[2];
		$_SESSION["password"] = $d[3];
		$_SESSION["gender"] = $d[4];
		$_SESSION["address"] = $d[5];
		$_SESSION["email"] = $d[6];
		$_SESSION["phone_Num"] = $d[7];
		$_SESSION["picture"] = $d[8];
		echo $d[8];
		$_SESSION["level_ID"] = $d[9];
		?>
		<script type="text/javascript">
			alert("Account is updated successfully!")
		</script>
		<?php
		header('Location: ../login/login.php');
		mysqli_close($conn);
	}else{
		?>
		<script type="text/javascript">
			alert("An error occured!");
		</script>
		<?php
		mysqli_close($conn);
	}
	

	//echo("Level doesnt make sense");
	//echo("<br> data fetched is".$d[5]);
}

?>