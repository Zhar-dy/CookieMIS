<?php
// Inialize session
//session_start();

// Include database connection settings
include('connectdb.php');
//echo "connected to DB.";

$sql = "SELECT * FROM users";
$query = mysqli_query($conn, $sql);
// Get total rows of the data
$totalRows = mysqli_num_rows($query);
//echo "Total Array: ".$totalRows;
$arrayOfArrays = array();
$staffArray = array();
global $staffArray;
$userArray = array();
global $userArray;
// Store the arrays into an array
while ($row = mysqli_fetch_array($query)) {
	$arrayOfArrays[] = $row;
}
/*
0) ID
1) username
2) name
3) password
4) gender
5) address
6) email
7) phone_Num
8) picture
9) level_ID
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
function getOrderDetailsStaff()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM orders";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}


	/*
		0 Order id
		1 Date
		2 Details
		3 Status
		4 User ID		
		*/
	echo "";
	$count = 0;
	for ($i = 0; $i < $totalRows; $i++) {
		if($arrayOfArrays[$i][3] != 5 && $arrayOfArrays[$i][3] != 3){
			$count++;
			echo "<form action='../reusableCodes/updateStatus.php' method='GET'>
			<tbody>
			<input type='hidden' name='orderID' value='".$arrayOfArrays[$i][0]."'>
			<input type='hidden' name='location' value='$i'>
				<tr>
					<td>" . $arrayOfArrays[$i][0] . "</td>";
					//echo $arrayOfArrays[$i][0];
			$sql2 = "SELECT * FROM users WHERE user_ID ='" . $arrayOfArrays[$i][4] . "'";
			$query = mysqli_query($conn, $sql2);
			$userArray = mysqli_fetch_array($query);

			echo "		<td>" . $userArray[2] . "</td>
						<td>" . $arrayOfArrays[$i][1] . "</td>
						<td>" . $arrayOfArrays[$i][2] . "</td>
						<td>";
			switch ($arrayOfArrays[$i][3]) {
				case 1:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"1\" selected>Pending</option>
								<option value=\"2\">Ready</option>
								<option value=\"3\">Received</option>
								<option value=\"4\">Shipped</option>
								<option value=\"5\">Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>";
					break;

				case 2:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"1\">Pending</option>
								<option value=\"2\" selected>Ready</option>
								<option value=\"3\">Received</option>
								<option value=\"4\">Shipped</option>
								<option value=\"5\">Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>";
					break;

				case 3:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"1\">Pending</option>
								<option value=\"2\">Ready</option>
								<option value=\"3\" selected>Received</option>
								<option value=\"4\">Shipped</option>
								<option value=\"5\">Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>";
					break;

				case 4:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"1\">Pending</option>
								<option value=\"2\">Ready</option>
								<option value=\"3\">Received</option>
								<option value=\"4\" selected>Shipped</option>
								<option value=\"5\">Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>";
					break;
				case 5:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"1\">Pending</option>
								<option value=\"2\">Ready</option>
								<option value=\"3\">Received</option>
								<option value=\"4\">Shipped</option>
								<option value=\"5\" selected>Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>";
					break;
				default:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"0\" disabled>Pending</option>
								<option value=\"2\">Pending</option>
								<option value=\"3\">Ready</option>
								<option value=\"4\">Received</option>
								<option value=\"5\">Shipped</option>
								<option value=\"5\">Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>";
					break;
			}
			echo "</form>"; //This is switch case bracket

		}
		
	}
	if ($count <1){
		//echo "<tr><td style='border:none'></td><td style='border:none'></td><td style='text-align:center;color:gray;'> No order yet...</td></tr>";
		echo "<table style='text-align:center;color:gray;'><td> No order yet...</td></table>";
	}

/*
		0 id
		1 name
		2 desc
		3 highlight
		4 available
		5 stock
		6 price
		7 image
		*/
}

function getOrderHistoryStaff()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM orders";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}


	/*
		0 Order id
		1 Date
		2 Details
		3 Status
		4 User ID		
		*/
	echo "";
	$count = 0;
	for ($i = 0; $i < $totalRows; $i++) {
		if($arrayOfArrays[$i][3] == 5 || $arrayOfArrays[$i][3] == 3){
			$count++;
			echo "<form action='../reusableCodes/updateStatus.php' method='GET'>
			<tbody>
			<input type='hidden' name='orderID' value='".$arrayOfArrays[$i][0]."'>
			<input type='hidden' name='location' value='$i'>
				<tr>
					<td>" . $arrayOfArrays[$i][0] . "</td>";
					//echo $arrayOfArrays[$i][0];
			$sql2 = "SELECT * FROM users WHERE user_ID ='" . $arrayOfArrays[$i][4] . "'";
			$query = mysqli_query($conn, $sql2);
			$userArray = mysqli_fetch_array($query);

			echo "		<td>" . $userArray[2] . "</td>
						<td>" . $arrayOfArrays[$i][1] . "</td>
						<td>" . $arrayOfArrays[$i][2] . "</td>
						<td>";
			switch ($arrayOfArrays[$i][3]) {
				case 1:
					echo "
							<div class=\"status\"><span class=\"pending\">Pending</span></div>
						</td>
						
					</tr>
				</tbody>";
					break;

				case 2:
					echo "
							<div class=\"status\"><span class=\"ready\">Ready</span></div>
						</td>
						
					</tr>
				</tbody>";
					break;

				case 3:
					echo "
							<div class=\"status\"><span class=\"received\">Received</span></div>
						</td>
						
					</tr>
				</tbody>";
					break;

				case 4:
					echo "
							<div class=\"status\"><span class=\"shipped\">Shipped</span></div>
						</td>
						
					</tr>
				</tbody>";
					break;
				case 5:
					echo "
							<div class=\"status\"><span class=\"delivered\">Delivered</span></div>
						</td>
						
					</tr>
				</tbody>";
					break;
				default:
					echo "
							<div class=\"status\"><span class=\"pending\">Pending</span></div>
						</td>
						
					</tr>
				</tbody>";
					break;
			}
			echo "</form>"; //This is switch case bracket

		}
		
	}
	if ($count <1){
		//echo "<tr><td style='border:none'></td><td style='border:none'></td><td style='text-align:center;color:gray;'> No order yet...</td></tr>";
		echo "<table style='text-align:center;color:gray;'><td> No order yet...</td></table>";
	}

/*
		0 id
		1 name
		2 desc
		3 highlight
		4 available
		5 stock
		6 price
		7 image
		*/
}
function getProducts()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	for ($i = 0; $i < $totalRows; $i++) {
		echo "<div class=\"box\">
                <div class=\"img-box\">
				<img src=\"images/cookies/" . $arrayOfArrays[$i][7] . "\">
                </div>
                <div class=\"detail-box\">
                    <h6>" . $arrayOfArrays[$i][1] . " <span>" . $arrayOfArrays[$i][3] . "</span></h6>
                    <p class=\"long_text\">" . $arrayOfArrays[$i][2] . "</p>
                    <h5>RM " . $arrayOfArrays[$i][6] . "</h5>";
		if ($arrayOfArrays[$i][4] === "Available" && $arrayOfArrays[$i][5] >= 1) {
			if (isset($_SESSION['username'])) {
				echo "<a href=\"cart.php\">BUY NOW</a>
				</div>
				   </div>";
			}
			else{
				echo "<a href=\"login/login.php\">BUY NOW</a>
				</div>
				   </div>";
			}
		} else {
			echo "<a href=\"#\" style=\"background-color:red\">Out of Stock!</a>
                	</div>
           			</div>";
		}
	}/*
		0 id
		1 name
		2 desc
		3 highlight
		4 available
		5 stock
		6 price
		7 image
		*/
}
function printStaff()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM users WHERE level_ID = 1";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	//print_r($arrayOfArrays);
	/*
		0 id
		1 username
		2 name
		3 password
		4 gender  make if 1, then gender is male
		5 address
		6 email
		7 phone
		8 picture
		9 level ID
		*/
	for ($i = 0; $i < $totalRows; $i++) {
		global $staffArray;
		array_push($staffArray, $arrayOfArrays[$i][0]); // Add 'apple' and 'raspberry'
		// Result: ['orange', 'banana', 'apple', 'raspberry']

		echo "<div class=\"trow\">
				<div class=\"cell\">
					" . $arrayOfArrays[$i][1] . "
				</div>
				<div class=\"cell\">
					" . $arrayOfArrays[$i][2] . "
				</div>";
		if ($arrayOfArrays[$i][4] == 1) {
			echo "<div class=\"cell\">
					Male  
				</div>";
		} else if ($arrayOfArrays[$i][4] == 2) {
			echo "<div class=\"cell\">
					Female
				</div>";
		} else {
			echo "<div class=\"cell\">
					Non Binary  
				</div>";
		}
		echo "	<div class=\"cell\">
					" . $arrayOfArrays[$i][5] . "
				</div>
				<div class=\"cell\">
					" . $arrayOfArrays[$i][6] . "
				</div>
				<div class=\"cell\">
					" . $arrayOfArrays[$i][7] . "
				</div>
      			<div class=\"cell\">";

	  $current_page = basename($_SERVER['PHP_SELF'], ".php");
	  //echo $arrayOfArrays[$i][0];

	  if ($current_page == "view_User") {
		echo "<button type='submit' class='btn btn-secondary' name='view' value='".$arrayOfArrays[$i][0]."'>
				View Profile
			  </button>
			  
		"; // goes view_Detail_User.php
	  } elseif ($current_page == "upd_User") {
		echo "<button type='submit' class='btn btn-secondary' name='update' value='".$arrayOfArrays[$i][0]."'".$arrayOfArrays[$i][0]."'>
				Update Profile
			  </button>"; // goes "updateUser.php"
		echo "<br><button type='submit' class='btn btn-primary' name='delete' value='".$arrayOfArrays[$i][0]."'".$arrayOfArrays[$i][0]."'>
				Delete
			  </button>";
	  }

echo "</div></div>";
	}/*
		0 id
		1 name
		2 desc
		3 highlight
		4 available
		5 stock
		6 price
		7 image
		*/
		//var_dump($staffArray);
		return ($staffArray);
}
function printUsers()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM users WHERE level_ID = 2";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	/*
		0 id
		1 username
		2 name
		3 password
		4 gender  make if 1, then gender is male
		5 address
		6 email
		7 phone
		8 picture
		9 level ID
		*/
	for ($i = 0; $i < $totalRows; $i++) {
		global $userArray;
		array_push($userArray, $arrayOfArrays[$i][0]);
		echo "<form action='updateUser.php' method='GET'><div class=\"trow\">
				<div class=\"cell\">
					" . $arrayOfArrays[$i][1] . "
				</div>
				<div class=\"cell\">
					" . $arrayOfArrays[$i][2] . "
				</div>";
		if ($arrayOfArrays[$i][4] == 1) {
			echo "<div class=\"cell\">
					Male  
				</div>";
		} else if ($arrayOfArrays[$i][4] == 2) {
			echo "<div class=\"cell\">
					Female
				</div>";
		} else {
			echo "<div class=\"cell\">
					Non Binary  
				</div>";
		}
		echo "<div class=\"cell\">
					" . $arrayOfArrays[$i][5] . "
				</div>
				<div class=\"cell\">
					" . $arrayOfArrays[$i][6] . "
				</div>
				<div class=\"cell\">
					" . $arrayOfArrays[$i][7] . "
				</div>
      <div class=\"cell\">";

		$current_page = basename($_SERVER['PHP_SELF'], ".php");
		
		if ($current_page == "view_User") {
			
			echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"view\" value=\"".$arrayOfArrays[$i][0]."\">View Profile</button>"; // goes view_Detail_User.php
		} elseif ($current_page == "upd_User") {
			
			echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"update\" value='".$arrayOfArrays[$i][0]."'>Update Profile</button>"; // goes "updateUser.php"
			echo "<br><button type=\"submit\" class=\"btn btn-primary\" name=\"delete\" value='".$arrayOfArrays[$i][0]."'>Delete</button>";
		}
		echo "</div></div>";
	}
	//var_dump($userArray);
	/*
		0 id
		1 name
		2 desc
		3 highlight
		4 available
		5 stock
		6 price
		7 image
		*/
		return ($userArray);
}
function getProductsWithoutHTML()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);
	
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
		//echo $row[4]."<br>";
	}
	// First initialization fix
	$i = 0;
	$dataToPost = "";
	$dataToPost = $arrayOfArrays[$i][1] . "|" . $arrayOfArrays[$i][3] . "|" . $arrayOfArrays[$i][2] . "|"
		. $arrayOfArrays[$i][4] . "|" . $arrayOfArrays[$i][5] . "|" . $arrayOfArrays[$i][6] . "|"
		. $arrayOfArrays[$i][7] . "|". $arrayOfArrays[$i][0] . "";
	// Set the rest of the data
	for ($i = 1; $i < $totalRows; $i++) {
		$dataToPost = $dataToPost . "+" . $arrayOfArrays[$i][1] . "|" . $arrayOfArrays[$i][3] . "|" . $arrayOfArrays[$i][2] . "|"
			. $arrayOfArrays[$i][4] . "|" . $arrayOfArrays[$i][5] . "|" . $arrayOfArrays[$i][6] . "|"
			. $arrayOfArrays[$i][7] . "|". $arrayOfArrays[$i][0] . "";
	}
	//echo $dataToPost;
	return $dataToPost;
}
function getProductsinJSON()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	return $arrayOfArrays;
}
function updateProduct()
{
	// Include database connection settings
	include('connectdb.php');

	$sql = "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	for ($i = 0; $i < $totalRows; $i++) {
		echo "<div class=\"box\">
                <div class=\"img-box\">
				<img src=\"../images/cookies/" . $arrayOfArrays[$i][7] . "\">
                </div>
                <div class=\"detail-box\">
                    <h6>" . $arrayOfArrays[$i][1] . " <span>" . $arrayOfArrays[$i][3] . "</span></h6>
                    <p class=\"long_text\">" . $arrayOfArrays[$i][2] . "</p>
                    <h5>RM " . $arrayOfArrays[$i][6] . "</h5>";
		if ($arrayOfArrays[$i][4] === "Available" && $arrayOfArrays[$i][5] >= 1) {
			echo "<a href=\"#\">Update Stock</a>
                	</div>
           			</div>";
		} else {
			echo "<a href=\"#\" style=\"background-color:red\">Refill Stock</a>
                	</div>
           			</div>";
		}
	}
}

// Sanitize the god damn inputs
function sanitize($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = cleanInput($data);
	echo "Data is: " . $data;
	return $data;
}
function cleanInput($data)
{
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
