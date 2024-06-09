<!DOCTYPE html>
<html lang="en">
<head>
  <title>CookieMIS</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
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
</head>
<body>
  <!-- Header File -->
  <?php include '../reusableCodes/headerStaff.php' ?>
  
  <!-- view section -->
  <section class="product_section">

        <div class="container">
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
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
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Style the status dropdown */
        .status-select {
            width: 100px;
        }
    </style>
</head>
<body>
<h1>Customer Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>2024-06-08</td>
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
            <!-- Add more rows for other orders -->
        </tbody>
    </table>
  <!-- view end -->>

</body>
</html>