<?php
// Inialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');

if(isset($_POST['login'])){
	
	/* capture values from HTML form */
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql= "SELECT username, password, level_id FROM user WHERE username= '$username' AND password= '$password'";
	$query = mysqli_query($conn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);
	if($row == 0){
	 // Jump to indexwrong page
	header('Location: loginNotFound.php'); 
	}
	else{
	 $r = mysqli_fetch_assoc($query);
	 $username= $r['username'];
	 //$password= $r['password'];
	 $level= $r['level_id'];
	 echo($level_id);
	
		if($level==1) { 
			$_SESSION['username'] = $r['username'];
			// Jump to secured page
			header('Location: ../staff/update_product.php'); 
		} 
		elseif($level==2) {
			$_SESSION['username'] = $r['username'];
			// Jump to secured page
			header('Location: ../user/index.php');
		}
		else {
			header('Location: login.php');
			//echo($level);
		}
		
	}	
}
mysqli_close($conn);
?>