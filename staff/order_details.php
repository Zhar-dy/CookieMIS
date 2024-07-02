<?php
session_start();
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
    <?php include '../reusableCodes/header1in.php' ?>
    <section class="product_section">
        <div class="container">
            <div class="container my-5 p-4 bg-white shadow rounded">
                <header class="mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="text-center">Order History</h1>
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
                    <tbody>
                        <tr>
                            <td><img class="img-history" src="../images/cookies/jumbo.png"></td>
                            <td>Cookie of Creativity</td>
                            <td>5</td>
                            <td>1</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td><img class="img-history" src="../images/cookies/chewy.png"></td>
                            <td>Cookie of Chocolate</td>
                            <td>8</td>
                            <td>1</td>
                            <td>8</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>