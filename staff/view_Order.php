<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order </title>
  
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php' ?>

    <!-- Header File -->
    <?php include '../reusableCodes/headerStaff.php';
    include '../reusableCodes/Functions.php' ?>

    <section class="product_section">
    <div class="container">

    <style>
        /* Basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            width: 550vh;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Style the status dropdown */
        .status-select {
            width: 100px;
            background-color: DodgerBlue;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
        /* Style the "Update" button */
        button {
            background-color: DodgerBlue;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: RoyalBlue;
        }
    </style>
</head>

<body>
<!-- view section -->
<h1>Customer Orders</h1>
        <!-- <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>2024-06-08</td>
                <td>put order details here</td>
                <td>
                    <select class="status-select">
                        <option value="pending">Pending</option>
                        <option value="ready">Ready</option>
                        <option value="received">Received</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                    </select>
                </td>
                <td><button>Update</button></td>
            </tr>
        </tbody> -->
        <?php getOrderDetailsStaff(1); ?>
        <br>
        <br>
        <?php getOrderDetailsStaff(2); ?>
        <br>
        <br>
        <?php getOrderDetailsStaff(4); ?>
        <br>
        <br>
  <!-- view end -->

</body>
</html>