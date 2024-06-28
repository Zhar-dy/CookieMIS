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
        <header class="mb-4">
            <h1 class="text-center">Order History</h1>
        </header>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
    </div>
    </div>
  </section>
  