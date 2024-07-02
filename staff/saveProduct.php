<?php
// Inialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');
$sql= "SELECT * FROM product WHERE product_ID = ".$_GET['productID'].";";
$query = mysqli_query($conn, $sql);
$tempArray = mysqli_fetch_array($query);
echo $sql;
if(isset($_GET['update'])){
	/* capture values from HTML form */
		/*
		0 id
		1 product_Name
		2 description
		3 highlight
		4 status
		5 stock
		6 price
		7 picture
		*/
    echo $sql;
	$tempname = $_GET['product_Name'];
	$temphighlight = $_GET['highlight'];
	$tempdesc = $_GET['desc'];
	$tempstatus = $_GET['status'];
	$tempstock = $_GET['stock'];
	$tempprice = $_GET['price'];
	if(!empty($tempname)){
		$productname = $tempname;
	}else{
		$productname = $tempArray[1];
	}
	if(!empty($temphighlight)){
		$highlight = $temphighlight;
	}else{
		$highlight = $tempArray[3];
	}
	if(!empty($tempdesc)){
		$description = $tempdesc;
	}else{
		$description = $tempArray[2];
	}
	if(!empty($tempprice)){
		$status= $tempstatus;
	}else{
		$status=$tempArray[4];
	}
	if(!empty($tempstock)){
		$stock= $tempstock;
	}else{
		$stock=$tempArray[5];
	}
	if(!empty($tempprice)){
		$price= $tempprice;
	}else{
		$price=$tempArray[6];
	}

	$sql2 = "UPDATE product SET product_Name = '".$productname."', product_Highlight = '".$highlight."', product_Description = '".$description."',product_Status = '".$status."', product_Price = '".$price."', product_Stock = '".$stock."' WHERE product_ID = '".$tempArray[0]."';";
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
	header('Location: view_Product.php');
	//echo("Level doesnt make sense");
	//echo("<br> data fetched is".$d[5]);
}
mysqli_close($conn);
?>