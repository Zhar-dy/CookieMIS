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
function getOrderDetailsStaff($orderStatus)
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
		total_Price
		5 User ID		
		*/
		echo "
		<table>
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Customer Name</th>
				<th>Order Date</th>
				<th>Order Details</th>
				<th>Order Info</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>";
	$count = 0;
	for ($i = 0; $i < $totalRows; $i++) {
		if ($arrayOfArrays[$i][3] == $orderStatus) {
			$count++;
			// Need to find a way to make the sebd button can send you to different places.
			echo "
			
				<tr>
					<td>" . $arrayOfArrays[$i][0] . "</td>";
			//echo $arrayOfArrays[$i][0];
			$sql2 = "SELECT * FROM users WHERE user_ID ='" . $arrayOfArrays[$i][5] . "'";
			$query = mysqli_query($conn, $sql2);
			$userArray = mysqli_fetch_array($query);
			//var_dump($userArray);
			//echo "<br><br>";
						echo "		<td>" . $userArray[2] . "</td> <!--  Gets Customer Name -->
						<td>" . $arrayOfArrays[$i][1] . "</td>
						<td>" . $arrayOfArrays[$i][2] . "</td>
						<form action='order_details.php' method='GET'>
						<td><button type='send' name='submit' value=1>Order Info</button></td>
						<input type='hidden' name='orderID' value='" . $arrayOfArrays[$i][0] . "'>
						</form>
						<form action='../reusableCodes/updateStatus.php' method='GET'>
						<input type='hidden' name='orderID' value='" . $arrayOfArrays[$i][0] . "'>
						<input type='hidden' name='location' value='$i'>
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
	if ($count < 1) {
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
		if ($arrayOfArrays[$i][3] == 5 || $arrayOfArrays[$i][3] == 3) {
			$count++;
			echo "<form action='../reusableCodes/updateStatus.php' method='GET'>
			<tbody>
			<input type='hidden' name='orderID' value='" . $arrayOfArrays[$i][0] . "'>
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
						<td><button>Order Details</button></td>
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
	if ($count < 1) {
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
		if ($arrayOfArrays[$i][4] === "1" && $arrayOfArrays[$i][5] >= 1) {
			if (isset($_SESSION['username'])) {
				echo "<a href=\"cart.php\">BUY NOW</a>
				</div>
				   </div>";
			} else {
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
			echo "<button type='submit' class='btn btn-secondary' name='view' value='" . $arrayOfArrays[$i][0] . "'>
				View Profile
			  </button>
			  
		"; // goes view_Detail_User.php
		} elseif ($current_page == "upd_User") {
			echo "<button type='submit' class='btn btn-secondary' name='update' value='" . $arrayOfArrays[$i][0] . "'" . $arrayOfArrays[$i][0] . "'>
				Update Profile
			  </button>"; // goes "updateUser.php"
			echo "<br><button type='submit' class='btn btn-primary' name='delete' value='" . $arrayOfArrays[$i][0] . "'" . $arrayOfArrays[$i][0] . "'>
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

			echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"view\" value=\"" . $arrayOfArrays[$i][0] . "\">View Profile</button>"; // goes view_Detail_User.php
		} elseif ($current_page == "upd_User") {

			echo "<button type=\"submit\" class=\"btn btn-secondary\" name=\"update\" value='" . $arrayOfArrays[$i][0] . "'>Update Profile</button>"; // goes "updateUser.php"
			echo "<br><button type=\"submit\" class=\"btn btn-primary\" name=\"delete\" value='" . $arrayOfArrays[$i][0] . "'>Delete</button>";
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
		. $arrayOfArrays[$i][7] . "|" . $arrayOfArrays[$i][0] . "";
	// Set the rest of the data
	for ($i = 1; $i < $totalRows; $i++) {
		$dataToPost = $dataToPost . "+" . $arrayOfArrays[$i][1] . "|" . $arrayOfArrays[$i][3] . "|" . $arrayOfArrays[$i][2] . "|"
			. $arrayOfArrays[$i][4] . "|" . $arrayOfArrays[$i][5] . "|" . $arrayOfArrays[$i][6] . "|"
			. $arrayOfArrays[$i][7] . "|" . $arrayOfArrays[$i][0] . "";
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

	// Output each product in a form
	for ($i = 0; $i < $totalRows; $i++) {
		echo "<div class=\"box\">
                <div class=\"img-box\">
                    <img src=\"../images/cookies/" . $arrayOfArrays[$i][7] . "\">
                </div>
                <div class=\"detail-box\">
                    <h6>" . $arrayOfArrays[$i][1] . " <span>" . $arrayOfArrays[$i][3] . "</span></h6>
                    <p class=\"long_text\">" . $arrayOfArrays[$i][2] . "</p>
                    <h5>RM " . $arrayOfArrays[$i][6] . "</h5>";

		// Check availability and display appropriate button

		if ($arrayOfArrays[$i][4] === "1" && $arrayOfArrays[$i][5] >= 1) {
			echo "<form action='updateStock.php' method='GET'>
					<button type='submit' class='btn btn-primary' name='update' value='" . $arrayOfArrays[$i][0] . "'" . $arrayOfArrays[$i][0] . "'>
				     Update Stock
			         </button>
                  </form>";
		} else {
			echo "<form action='updateStock.php' method='GET'>
					<button type='submit' class='btn btn-secondary' name='update' value='" . $arrayOfArrays[$i][0] . "'" . $arrayOfArrays[$i][0] . "'>
				     Not available/Refill Stock
			         </button>
                  </form>";
		}

		echo "</div></div>"; // Close detail-box and box divs
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
function orderHistory(){
	// Include database connection settings
	include('connectdb.php');
	// Get all information needed
	$sql = "SELECT 
	orders.order_ID,
	orders.order_Date,
	orders.order_Details,
	orders.order_Status,
	orders.total_Price,
	delivery.pickup_Date 
	FROM orders 
	INNER JOIN delivery ON orders.order_ID = delivery.order_ID
	WHERE orders.user_ID =  {$_SESSION['user_ID']}
	ORDER BY orders.order_ID DESC";
	$query = mysqli_query($conn, $sql);
	// Get total order of the user
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	/*
	
  0)order_ID
  1)order_Date
  2)order_Details
  3)order_Status
  4)total_Price
  5)pickup_Date
		'.$arrayOfArrays[$i][1].'
	*/
	for ($i = 0; $i < $totalRows; $i++) { // Loop for every Order ID
										  // NOTE: need to categorize things respectively
		echo '<div class="order-section">
            <h2>'.$arrayOfArrays[$i][1].'</h2> 
            <div class="order">
                <div class="order-header">
                    <div>
                        <a class="bigTxt">Order ID: '.$arrayOfArrays[$i][0].'</a>
                    </div>
                </div>
                <div class="order-details">
                    <div>
                        <h5>Order Status: </h5>';
		switch ($arrayOfArrays[$i][3]) {
			case 1:
				echo '<div class="status"><span class="pending">Pending</span></div>';
				break;
			case 2:
				echo '<div class="status"><span class="ready">Ready</span></div>';
				break;
			case 3:
				echo '<div class="status"><span class="received">Received</span></div>';
				break;
			case 4:
				echo '<div class="status"><span class="shipped">Shipped</span></div>';
				break;
			case 5:
				echo '<div class="status"><span class="delivered">Delivered</span></div>';
				break;
			default:
				echo '<div class="status"><span class="pending">Unknown</span></div>';
				break;
		}       
        echo		'</div>
                    <div>
                        <h5>Total cost: </h5>
                        <div class="h5"> RM '.$arrayOfArrays[$i][4].'</div>
                    </div>
                    <div>
                        <h5>Pickup Date: </h5>
                        <div class="h5"> '.$arrayOfArrays[$i][5].'</div>
                    </div>
                    <div>
                        <h5>Details: </h5>
                        <div class="smallTXT"> '.$arrayOfArrays[$i][2].'</div>
                    </div>
                </div>
                <div class="order-items">';
	// Get otder Details and product details
	$sql2 = "SELECT 
	orderdetails.quantity,
	product.product_Name,
	product.product_Highlight,
	product.product_Price,
	product.picture
	FROM orderdetails 
	INNER JOIN product ON product.product_ID = orderdetails.product_ID 
	WHERE order_ID = {$arrayOfArrays[$i][0]}";
 	$query2 = mysqli_query($conn, $sql2);
 	// Get total rows of the data
 	$totalRows2 = mysqli_num_rows($query2);
 	$arrayOfArrays2 = array();
 	// Store the arrays into an array
 	while ($row2 = mysqli_fetch_array($query2)) {
		 $arrayOfArrays2[] = $row2;
 	}
	/*
	0)quantity	
	1)product_Name	
	2)product_Highlight
	3)product_Price	
	4)picture
	*/
	 for ($j = 0; $j < $totalRows2; $j++) { 
               echo'<div class="item">
                        <img src="images/cookies/'.$arrayOfArrays2[$j][4].'" alt="chewy cookie">
                        <div>'.$arrayOfArrays2[$j][1].' '.$arrayOfArrays2[$j][2].'<br>RM '.$arrayOfArrays2[$j][3].'</div>
                        <div>Quantity: <br>'.$arrayOfArrays2[$j][0].'</div>
                    </div>';
				}
				echo'</div>
			</div>
		</div>';
	}
}
function getOrderDetails($orderID){
	// Include database connection settings
	include('connectdb.php');
	// Get the order ID and the order details
	$sql = "SELECT 
	orderdetails.quantity,
	product.product_Name,
	product.product_Highlight,
	product.product_Price,
	product.picture,
	orders.total_Price
	FROM orders 
	INNER JOIN orderdetails ON orders.order_ID=orderdetails.order_ID
	INNER JOIN product ON orderdetails.product_ID=product.product_ID 
	WHERE orders.order_ID = {$orderID}";
	/*
	0)quantity
	1)product_Name
	2)product_Highlight
	3)product_Price
	4)picture
	5)total_Price
	*/
	$query = mysqli_query($conn, $sql);
	// Get total rows of the data
	$totalRows = mysqli_num_rows($query);
	$arrayOfArrays = array();
	// Store the arrays into an array
	while ($row = mysqli_fetch_array($query)) {
		$arrayOfArrays[] = $row;
	}
	for ($i = 0; $i < $totalRows; $i++) { 
		echo '<tr>
								<td><img class="img-history" src="../images/cookies/'.$arrayOfArrays[$i][4].'"></td>
								<td>'.$arrayOfArrays[$i][1].$arrayOfArrays[$i][2].'</td>
								<td>'.$arrayOfArrays[$i][3].'</td>
								<td>'.$arrayOfArrays[$i][0].'</td>
								<td>'.$arrayOfArrays[$i][5].'</td>
							</tr>';
	}
}