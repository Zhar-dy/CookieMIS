<?php
     include 'reusableCodes/Functions.php';
     $array = getProductsWithoutHTML();
     $array2 = getProductsInJSON();
// Convert data to JSON format
$json = json_encode($array);

// Output the JSON data
//echo"<h1>PHP Just Fine! Array:</h1><br>".$array."<br><br>";
echo $json;
