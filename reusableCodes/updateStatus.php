<?php
// Inialize session
session_start();
$orderID= $_GET['orderID'];
$location= $_GET['location'];
echo "<br>Order ID: $orderID<br>Position in Array: $location";
// Include database connection settings
include('../reusableCodes/connectdb.php');
print_r($_GET['status']);
	$sql2 = "UPDATE orders SET order_Status = ".$_GET['status'][0]." WHERE order_ID=$orderID;";
	echo "<br>".$sql2."<br>";
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
header("location:../staff/view_Order.php")
?>