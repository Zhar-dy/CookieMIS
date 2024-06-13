<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update User</title>
    <!-- Header Meta File -->
    <?php include 'reusableCodes/headerMeta.php' ?>
</head>

<body>
    <!-- Header File -->
    <?php include 'reusableCodes/header.php';
    if (!isset($_SESSION['name'])) {
        header('Location: index.php');
    }
    ?>
    <!--view user-->

    <section class="view_product_section">

        <div class="profile py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div style="height: 70px"></div>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="images/batman.png">
                                <h5 class="title_text">Batman</h5>
                                <h7>Bruce Wayne</h7>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div style="height: 70px"></div>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="fa fa-user"></i>
                                    Personal Information</h3><br>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Gender :</th>
                                        <td width="50%">if 1 then male</td>
                                    </tr>

                                    <tr>
                                        <th width="30%">Address :</th>
                                        <td width="50%">Klang, Selangor (klang need batman)</td>
                                    </tr>

                                    <tr>
                                        <th width="30%">Phone No. :</th>
                                        <td width="50%">991</td>
                                    </tr>

                                    <tr>
                                        <th width="30%">Email :</th>
                                        <td width="50%">batman@gmail.com</td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <!--view user-->
    <!-- Footer File -->
    <?php include 'reusableCodes/footer.php' ?>
</body>

</html>