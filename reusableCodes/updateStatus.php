<?php
// Inialize session
session_start();
echo $_GET['status'][0];
// Include database connection settings
include('../reusableCodes/connectdb.php');
	$sql2 = "UPDATE orders SET order_Status = '".$_GET['status'][0]."';";
	$query = mysqli_query($conn, $sql2);
	if($query){
        echo "success!";
	}else{
		echo "Failes";
	}
	
	//header('Location: ../login/login.php');
	//echo("Level doesnt make sense");
	//echo("<br> data fetched is".$d[5]);

mysqli_close($conn);
?>