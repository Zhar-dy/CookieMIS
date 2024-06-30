<?php
session_start(); // Start the session (if not already started)

if (isset($_POST['data'])) {
    $phpVariable = $_POST['data'];
     // Retrieve data from JavaScript
    // Use $phpVariable as needed
    echo 'Data received successfully!';
    $receivedData = json_decode($phpVariable,true);
$_SESSION['cartData']=$receivedData;
}

