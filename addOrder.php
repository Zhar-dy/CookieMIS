<?php
session_start();
$name = $_POST['name'];
$deliveryOption = $_POST['DeliOptions'];
$datep = $_POST['datep'];
$timep = $_POST['timep'];
$AddInstructions = $_POST['moreInstruct'];
$arrayOfOrders = $_POST['arrayOrder'];
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
echo "Data in Array: ";
print_r($arrayOfOrders);
echo "<br>";
