<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .order_container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .headers, .order_section {
            margin-bottom: 20px;
        }
        .headers h1 {
            font-size: 24px;
            margin: 0 0 10px;
        }
        .headers .order-total {
            font-size: 20px;
            color: #555;
        }
        .headers .place-order-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
        }
        .order_section {
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .order_section h2 {
            font-size: 18px;
            margin: 0 0 10px;
        }
        .order_section .edit {
            float: right;
            color: #4CAF50;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="order_container">
        <div class="headers">
            <h1>Order Confirmation</h1>
            <div class="order-total">Order Total: $3137.85</div>
            <button class="place-order-btn">Place Order</button>
        </div>
        <div class="order_section info-box">
            <h2>Your Information <span class="edit">Edit</span></h2>
            <?php
            echo '<div class="caller"> ' . $_SESSION['username'] . '</div>';
            ?>
        </div>
        <div class="order_section shipping-box">
            <h2>Shipping Address <span class="edit">Edit</span></h2>
            <p>Min Peng</p>
            <p>710 Mariners Island Blvd, Apt 210</p>
            <p>San Mateo, CA 94404</p>
            <p>United States</p>
            <p>(315) 396-7661</p>
        </div>

        <div class="order_section">
            <h2>Order Items</h2>
            <table class="item-list">
                <tr>
                    <th>Item</th>
                    <th>Retailer</th>
                    <th>Attributes</th>
                    <th>Quantity</th>
                    <th>Shipping</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>MARNI Blue Trunk Bag In Buffalo</td>
                    <td>Marni</td>
                    <td>Color: Blue<br>Size: One Size</td>
                    <td>1</td>
                    <td>$15.00</td>
                    <td>$2160.00</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
