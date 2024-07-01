<?php
session_start();
include 'ReusableCodes/connectdb.php';
$currentDate = date('d-m-Y');
$userID = $_SESSION['user_ID'];
$name = $_POST['name'];
$deliveryOption = $_POST['DeliOptions'];
$datep = $_POST['datep'];
$timep = $_POST['timep'];
$AddInstructions = $_POST['moreInstruct'];
$arrayOfOrders = $_POST['arrayOrder'];
echo "User ID: ". $userID;
echo "<br>";
echo "name: ". $name;
echo "<br>";
echo "Delivery Option: ". $deliveryOption;
echo "<br>";
echo "Date Pickup: ". $datep;
echo "<br>";
echo "Time Pickup: ". $timep;
echo "<br>";
echo "Additional Instructions: ". $AddInstructions;
echo "<br>";
echo "Data in Array: ". $arrayOfOrders;
//print_r($arrayOfOrders);
echo "<br>";
// Place the Order with the Additional Instruction first
$SQL= "INSERT INTO `orders`(`order_Date`, `order_Details`, `order_Status`, `user_ID`) 
       VALUES ('$currentDate','$AddInstructions',1,'$userID')";
$query=mysqli_query($conn,$SQL);
if($query){
    echo "Successfully added an Order";
}
$SQL= "SELECT * FROM orders WHERE order_Date = '$currentDate' AND user_ID = $userID";
$query=mysqli_query($conn,$SQL);
$data = mysqli_fetch_array($query);
echo $data[0]; // This is the order ID
$orderID = $data[0];
echo 
// Add the orders and quantity to database
$arrayOrder = explode(',', $arrayOfOrders);
echo "<br><br>". $arrayOfOrders."<br><br>";
$totalData = count($arrayOrder);
print_r($arrayOrder);
echo "<br><br>";
for ($i = 0; $i< $totalData; $i = $i + 2){
    $j = $i+1;
    $sql = "INSERT INTO `orderdetails`(`order_ID`, `product_ID`, `quantity`) VALUES ($orderID,'".$arrayOrder[$i]."','".$arrayOrder[$j]."')";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "Successfully added cookie with the ID ".$arrayOrder[$i]." and quantity ".$arrayOrder[$j]."<br>";
    }else{
        echo "<br><br> An error occured";
    }
}

// Add the order delivery method
if ($deliveryOption == "Pickup"){
    $sql = "INSERT INTO `delivery`(`delivery_Status`, `delivery_Type`, `delivery_Estimated_Time`, `order_ID`, `pickup_Date`) 
            VALUES ('preparing','Pickup','$timep',$orderID,'$datep')";
            echo "<br>".$sql."<br>";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "Successfully added Pick Up<br>";
        echo 'Order successfully Placed!';
        header('location: indexAddedOrder.php');
    }else{
        echo "<br><br> An error occured";
    }
}else{
    $sql = "INSERT INTO `delivery`(`delivery_Status`, `delivery_Type`, `delivery_Estimated_Time`, `order_ID`, `pickup_Date`) 
            VALUES ('preparing','Delivery','$timep',$orderID,'$datep')";
            echo "<br>".$sql."<br>";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "Successfully added delivery<br>";
        echo 'Order successfully Placed!';
        header('location: indexAddedOrder.php');
    }else{
        echo "<br><br> An error occured";
    }
}
