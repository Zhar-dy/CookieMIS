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
                    <h5>RM ".$arrayOfArrays[$i][6]."</h5>";
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
				<img src=\"../images/cookies/".$arrayOfArrays[$i][7]."\">
                </div>
                <div class=\"detail-box\">
                    <h6>".$arrayOfArrays[$i][1]." <span>".$arrayOfArrays[$i][3]."</span></h6>
                    <p class=\"long_text\">".$arrayOfArrays[$i][2]."</p>
                    <h5>RM ".$arrayOfArrays[$i][6]."</h5>";
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

// Sanitize the god damn inputs
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = cleanInput($data);
    return $data;
}
function cleanInput($data) {
    $search = array(
        '/&/i',  // ampersand
        '/</i',  // less than
        '/>/i',  // greater than
        '/"/i',  // quote
        '/\'/i'  // apostrophe
    );

    $replace = array(
        '',
        '',
        '',
        '',
        ''
    );

    $data = preg_replace($search, $replace, $data);

    return $data;
}
