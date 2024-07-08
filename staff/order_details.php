<?php
session_start();
$orderID = $_GET['orderID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Order History</title>
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>

<body>
    <!-- Header File -->
    <?php include '../reusableCodes/headerstaff.php' ?>
    <section class="product_section">
        <div class="container">
            <div class="container my-5 p-4 bg-white shadow rounded">
                <header class="mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="text-center">Order History</h1>
                    <!-- Echo Receive Type: and then the delivery_Type values -->
                    <div>
                        <span style="font-size: 24px;">Receive Type:</span>
                        <?php
                        // Include database connection settings
                        include('../reusableCodes/connectdb.php');
                        $orderID2 = $_GET['orderID'];
                        $sql = "SELECT * FROM delivery WHERE order_ID = $orderID2";
                        $query = mysqli_query($conn, $sql);

                        // Check if the query was successful
                        if (!$query) {
                            die('Error: ' . mysqli_error($conn));
                        }

                        // Get total rows of the data
                        $totalRows = mysqli_num_rows($query);
                        $arrayOfArrays = array();

                        // Store the arrays into an array
                        while ($row = mysqli_fetch_assoc($query)) {
                            $arrayOfArrays[] = $row;
                        }


                        echo "<a style=\"font-size: 24px;\">" . $arrayOfArrays[0]['delivery_Type']. "</a>";
                        
                        ?>
                    </div>

                    <a href="view_Order.php" class="btn btn-primary">Return</a>
                </header>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Cookie Type</th>
                            <th scope="col">Price per Cookie</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <?php include '../reusableCodes/Functions.php' ?>
                    <tbody>
                        <?php getOrderDetails($orderID); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
