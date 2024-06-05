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
	}else{
		$password=$_SESSION['password'];
	}
	$sql= "SELECT * FROM users WHERE username= '".$_SESSION['username']."' AND password= '".$_SESSION['password']."'";
	$query = mysqli_query($conn, $sql);
	$tempArray = mysqli_fetch_array($query);
	$sql2 = "UPDATE users SET name = '".$username."', password = '".$password."', email = '".$email."', phone_Num = '".$phone."' WHERE user_ID = '".$tempArray[0]."';";
	$query = mysqli_query($conn, $sql2);
	if($query){
		$sql= "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
		$query = mysqli_query($conn, $sql);
		$d = mysqli_fetch_array($query);
		$username= $r['username'];
		//$password= $r['password'];
		$level= $r['level_id'];

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
		$_SESSION["level_ID"] = $d[9];
		?>
		<script type="text/javascript">
			alert("Account is updated successfully!")
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("An error occured!");
		</script>
		<?php
		
	}
	
	header('Location: ../login/login.php');
	//echo("Level doesnt make sense");
	//echo("<br> data fetched is".$d[5]);
}
mysqli_close($conn);
?>