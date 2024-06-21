<?php
// Inialize session
//session_start();

// Include database connection settings
include('connectdb.php');
echo "connected to DB.";

$sql = "SELECT * FROM users";
$query = mysqli_query($conn, $sql);
// Get total rows of the data
$totalRows = mysqli_num_rows($query);
//echo "Total Array: ".$totalRows;
$arrayOfArrays = array();
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
	for ($i = 0; $i < $totalRows; $i++) {
		if($arrayOfArrays[$i][3] != 5){
			echo "<form action='../reusableCodes/updateStatus.php' method='GET'>
			<tbody>
				<tr>
					<td>" . $arrayOfArrays[$i][0] . "</td>";
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
								<option value=\"pending\" selected>Pending</option>
								<option value=\"ready\">Ready</option>
								<option value=\"received\">Received</option>
								<option value=\"shipped\">Shipped</option>
								<option value=\"delivered\">Delivered</option>
							</select>
						</td>
						<td><button>Update</button></td>
					</tr>
				</tbody>";
					break;

				case 2:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"pending\">Pending</option>
								<option value=\"ready\" selected>Ready</option>
								<option value=\"received\">Received</option>
								<option value=\"shipped\">Shipped</option>
								<option value=\"delivered\">Delivered</option>
							</select>
						</td>
						<td><button>Update</button></td>
					</tr>
				</tbody>";
					break;

				case 3:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"pending\">Pending</option>
								<option value=\"ready\">Ready</option>
								<option value=\"received\" selected>Received</option>
								<option value=\"shipped\">Shipped</option>
								<option value=\"delivered\">Delivered</option>
							</select>
						</td>
						<td><button>Update</button></td>
					</tr>
				</tbody>";
					break;

				case 4:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"pending\">Pending</option>
								<option value=\"ready\">Ready</option>
								<option value=\"received\">Received</option>
								<option value=\"shipped\" selected>Shipped</option>
								<option value=\"delivered\">Delivered</option>
							</select>
						</td>
						<td><button>Update</button></td>
					</tr>
				</tbody>";
					break;
				case 5:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"pending\">Pending</option>
								<option value=\"ready\">Ready</option>
								<option value=\"received\">Received</option>
								<option value=\"shipped\">Shipped</option>
								<option value=\"delivered\" selected>Delivered</option>
							</select>
						</td>
						<td><button>Update</button></td>
					</tr>
				</tbody>";
					break;
				default:
					echo "
							<select class=\"status-select\" name='status[]' id ='status[]'>
								<option value=\"Select\" disabled>Pending</option>
								<option value=\"pending\">Pending</option>
								<option value=\"ready\">Ready</option>
								<option value=\"received\">Received</option>
								<option value=\"shipped\">Shipped</option>
								<option value=\"delivered\">Delivered</option>
							</select>
						</td>
						<td><button type='send'>Update</button></td>
					</tr>
				</tbody>
				</form>";
					break;
			}
		}
		 //This is switch case bracket

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
		echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"view\" value=\"".$i."\">View Profile</button>
		"; // goes view_Detail_User.php
	  } elseif ($current_page == "upd_User") {
		echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"update\">Update Profile</button>"; // goes "updateUser.php"
		echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"delete\">Delete</button>";
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
			
			echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"view\" value=\"".$i."\">View Profile</button>
			<button type=\"Hidden\" class=\"btn btn-secondary\" name=\"type\" value=\"admin\" hidden></button>"; // goes view_Detail_User.php
		} elseif ($current_page == "upd_User") {
			
			echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"update\">Update Profile</button>"; // goes "updateUser.php"
			echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"delete\">Delete</button>";
		}
		echo "</div></div>";
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
	}
	// First initialization fix
	$i = 0;
	$dataToPost = "";
	$dataToPost = $arrayOfArrays[$i][1] . "|" . $arrayOfArrays[$i][3] . "|" . $arrayOfArrays[$i][2] . "|"
		. $arrayOfArrays[$i][4] . "|" . $arrayOfArrays[$i][5] . "|" . $arrayOfArrays[$i][6] . "|"
		. $arrayOfArrays[$i][7] . "";
	// Set the rest of the data
	for ($i = 1; $i < $totalRows; $i++) {
		$dataToPost = $dataToPost . "+" . $arrayOfArrays[$i][1] . "|" . $arrayOfArrays[$i][3] . "|" . $arrayOfArrays[$i][2] . "|"
			. $arrayOfArrays[$i][4] . "|" . $arrayOfArrays[$i][5] . "|" . $arrayOfArrays[$i][6] . "|"
			. $arrayOfArrays[$i][7] . "";
	}
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
