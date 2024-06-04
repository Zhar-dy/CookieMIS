<?php
// Inialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');

if(isset($_POST['login'])){
	/* capture values from HTML form */
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql= "SELECT username, password, level_id FROM users WHERE username= '$username' AND password= '$password'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($query);
	if($row == 0){
	 // Jump to index wrong page
	header('Location: loginNotFound.php'); 
	}else{
		$r = mysqli_fetch_assoc($query);
		$sql= "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
		$query = mysqli_query($conn, $sql);
		$d = mysqli_fetch_array($query);
		$username= $r['username'];
		//$password= $r['password'];
		$level= $r['level_id'];
		?>
		<script type="text/javascript">
			alert("Cookies are set!")
		</script>
		<?php
		// Set cookies for the user
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
			alert("Cookies are set!")
		</script>
		<?php


	
		if($level==1) { 
			$_SESSION['username'] = $r['username'];
			// Jump to secured page
			header('Location: ../staff/update_product.php');
			//echo("You are an Admin");
			//echo("<br> data fetched is".$d[5]);
		} 
		elseif($level==2) {
			$_SESSION['username'] = $r['username'];
				header('Location: ../index.php');
				//echo("You are a user");
				//echo("<br> data fetched is".$_COOKIE['username']);
		}
		else {
			header('Location: login.php');
			//echo("Level doesnt make sense");
			//echo("<br> data fetched is".$d[5]);
		}
		
	}	
}
mysqli_close($conn);
?>