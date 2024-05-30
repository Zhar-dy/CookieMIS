<?php
//connect to database
include("../reusableCodes/connectDB.php");
//Defines basic variables
$name=$_POST['name'];
$password=$_POST['password'];

//querying SQL to get data from a table
$tryConnect = mysqli_query($conn, "SELECT * FROM `staff` WHERE `StaffName` = '$name'");

//Checks if connection can be made
if ($tryConnect){
    //Get the array of the fetched data
	$dataFetched = mysqli_fetch_array($tryConnect);
	//Get Staff ID from the dataFetched Array
    $userID = $dataFetched['StaffID']; 
	if (empty($userID)){
		//Proceeds with checking in Customer's Database
        $tryConnect = mysqli_query($conn, "SELECT * FROM `customer` WHERE `CustName` = '$name'");
        if ($tryConnect){
            //Get the array of the fetched data
            $dataFetched = mysqli_fetch_array($tryConnect);
            //Get Staff ID from the dataFetched Array
            $userID = $dataFetched['CustID']; 
            if (empty($userID)){
                ?>
				<script type="text/javascript">
                    window.alert("Username doesnt exists!"); 
                </script>
                <?php
            // If Customer ID is found, execute the below
            }else{
				$userName = $dataFetched['CustName']; 
				$userAddress = $dataFetched['CustAddress']; 
				$userEmail = $dataFetched['CustEmail'];
				$userPass = $dataFetched['CustPass']; 
				$userPhoneNo = $dataFetched['CustPhoneNo']; 
            }
        }else{
            echo "There's an error while trying to query SQL for fetching Customer ID";
            return;
        }
	// If Staff ID is found, execute the below
	}else{
		$userName = $dataFetched['StaffName']; 
		$userRole = $dataFetched['StaffRole']; 
		$userPass = $dataFetched['StaffPass']; 
		$userEmail = $dataFetched['StaffEmail'];
		$userPhoneNo = $dataFetched['StaffPhoneNo']; 
	}
}else{
	echo "There's an error while trying to query SQL for fetching Staff ID";
	return;
}
/*
$userAddress
$userName
$userRole (Admin only)
$userPass
$userEmail
$userPhoneNo
*/
//$password = md5($password);
//$password = md5($password);
# Note: Password is digested twice so that the general password will have minimum 32 letters of mixed characters
// Fetch Password from the website
if($password == $userPass) {
	echo "Login Attempt successful!";
	echo "<br>";
	echo "Redirecting...";
	
	//Set the cookie for all data fetched about a user
	setcookie("username", $userName);
	setcookie("email", $userEmail);
	setcookie("password", $userPass);
	setcookie("phoneNo", $userPhoneNo);
	setcookie("address", $userAddress);
	setcookie("Role", $userRole,0);
	if($userRole == "Administrator"||$userRole == "Staff"){
		header('Location: ../admin/index.php');
	}else{
		header('Location: ../index.php');
	}

}else{
	// If password is incorrect, go back to a specific page (need to disscuss)
	echo "Password incorrect!";
	?>
	<script type="text/javascript">
		window.alert("Password Incorrect!");
		header('../login/login.php')
		</script>
	<?php
}

$conn->close();

?>