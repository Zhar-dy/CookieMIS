<?php
// Inialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');
$sql= "SELECT * FROM users WHERE user_ID = ".$_GET['userID'].";";
$query = mysqli_query($conn, $sql);
$tempArray = mysqli_fetch_array($query);
echo $sql;
if(isset($_GET['update'])){
	/* capture values from HTML form */
    echo $sql;
	$tempusername = $_GET['name'];
	$tempemail = $_GET['email'];
	$tempphoneNum = $_GET['phone'];
	$temppassword = $_GET['password'];
	if(!empty($tempusername)){
		$username = $tempusername;
	}else{
		$username = $tempArray[2];
	}
	if(!empty($tempemail)){
		$email = $tempemail;
	}else{
		$email = $tempArray[6];
	}
	if(!empty($tempphoneNum)){
		$phone= $tempphoneNum;
	}else{
		$phone=$tempArray[7];
	}
	if(!empty($temppassword)){
		$password = $temppassword;
        $password= md5($password);
        $password= md5($password);
	}else{
		$password=$tempArray[1];
	}
	// $sql= "SELECT * FROM users WHERE username= '".$_SESSION['username']."' AND password= '".$_SESSION['password']."'";
	// $query = mysqli_query($conn, $sql);
	// $tempArray = mysqli_fetch_array($query);
	$sql2 = "UPDATE users SET name = '".$username."', password = '".$password."', email = '".$email."', phone_Num = '".$phone."' WHERE user_ID = '".$tempArray[0]."';";
	$query = mysqli_query($conn, $sql2);
	if($query){
		?>
		<script type="text/javascript">
			alert("Account is updated successfully!")
		</script>
		<?php
        echo "Successfully Updated account";
	}else{
		?>
		<script type="text/javascript">
			alert("An error occured!");
		</script>
		<?php
        echo "Unuccessfully Updated account";
		
	}
	echo "<br>Process finished";
	header('Location: upd_User.php');
	//echo("Level doesnt make sense");
	//echo("<br> data fetched is".$d[5]);
}
mysqli_close($conn);
?>