<?php
	// Inialize session
	session_start();
	
	// Include database connection settings
	include('connectdb.php');


	$sql= "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	//echo "Total Array: ".$totalRows;
	$arrayOfArrays = array();
	// Store the arrays into an array
	while($row = mysqli_fetch_array($query)){
		$arrayOfArrays[] = $row;
		}
	/*
	echo "<br>Data:<br>";

	// Get every data from the arrays
	for($i=0; $i<$totalRows; $i++){
		echo "(";
		for($j=0; $j<8; $j++){
			if ($j == 7){
				echo $arrayOfArrays[$i][$j];
			}else{
				echo $arrayOfArrays[$i][$j] .",";
			}
		}
		echo ")<br>";
	}
	*/
	function getProducts() {
		// Include database connection settings
		include('connectdb.php');

		$sql= "SELECT * FROM product";
		$query = mysqli_query($conn, $sql);
		// Get total rows of the data
		$totalRows = mysqli_num_rows($query);
		$arrayOfArrays = array();
		// Store the arrays into an array
		while($row = mysqli_fetch_array($query)){
			$arrayOfArrays[] = $row;
		}
		for($i=0; $i<$totalRows; $i++){
			echo"<div class=\"box\">
                <div class=\"img-box\">
				<img src=\"images/cookies/".$arrayOfArrays[$i][7]."\">
                </div>
                <div class=\"detail-box\">
                    <h6>".$arrayOfArrays[$i][1]." <span>".$arrayOfArrays[$i][3]."</span></h6>
                    <p class=\"long_text\">".$arrayOfArrays[$i][2]."</p>
                    <h5>RM".$arrayOfArrays[$i][6]."</h5>";
			if ($arrayOfArrays[$i][4]==="Available" && $arrayOfArrays[$i][5] >= 1){
				echo "<a href=\"#\">BUY NOW</a>
                	</div>
           			</div>";
			}else{
				echo "<a href=\"#\" style=\"background-color:red\">Out of Stock!</a>
                	</div>
           			</div>";
			}
		}
	}
	function updateProduct() {
		// Include database connection settings
		include('connectdb.php');

		$sql= "SELECT * FROM product";
		$query = mysqli_query($conn, $sql);
		// Get total rows of the data
		$totalRows = mysqli_num_rows($query);
		$arrayOfArrays = array();
		// Store the arrays into an array
		while($row = mysqli_fetch_array($query)){
			$arrayOfArrays[] = $row;
		}
		for($i=0; $i<$totalRows; $i++){
			echo"<div class=\"box\">
                <div class=\"img-box\">
				<img src=\"images/cookies/".$arrayOfArrays[$i][7]."\">
                </div>
                <div class=\"detail-box\">
                    <h6>".$arrayOfArrays[$i][1]." <span>".$arrayOfArrays[$i][3]."</span></h6>
                    <p class=\"long_text\">".$arrayOfArrays[$i][2]."</p>
                    <h5>RM".$arrayOfArrays[$i][6]."</h5>";
			if ($arrayOfArrays[$i][4]==="Available" && $arrayOfArrays[$i][5] >= 1){
				echo "<a href=\"#\">Update Stock</a>
                	</div>
           			</div>";
			}else{
				echo "<a href=\"#\" style=\"background-color:red\">Refill Stock</a>
                	</div>
           			</div>";
			}
		}
	}


/*
Data Available:
1)product_ID
2)product_Name
3)product_Description
4)product_Highlight
5)product_Status
6)product_Stock
7)product_Price
8)picture
*/


/*
echo "<br>";
for($i=0; $i<$totalRows; $i++){
	print_r($arrayOfArrays[$i]);
	echo "<br>";
}
*/
	
/*
	//$password= $r['password'];
	$level= $r['level_id'];

?>
<script type="text/javascript">
	alert("An error occured!");
</script>
<?php
	header('Location: ../login/login.php');
	
	
	//echo("Level doesnt make sense");
	//echo("<br> data fetched is".$d[5]);
	
	mysqli_close($conn);
	?>
*/