<?php
session_start();
$userView = $_POST['view'];//This is the user ID
$userType = $_POST['type'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update User</title>
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>

<body>
    <!-- Header File -->
    <?php include '../reusableCodes/headerStaff.php';
    if (!isset($_SESSION['name'])) {
        header('Location: index.php');
    }
    // Include database connection settings
    include('../reusableCodes/connectdb.php');


    $sql = "SELECT * FROM users WHERE user_ID = $userView";
    //echo $sql;
    $query = mysqli_query($conn, $sql);
    // Get total rows of the data
    $totalRows = mysqli_num_rows($query);
    //echo "Total Array: ".$totalRows;
    $arrayOfArrays = array();
    // Store the arrays into an array
    while ($row = mysqli_fetch_array($query)) {
        $arrayOfArrays[] = $row;
        //echo $row[1];
    }
    /*
0) ID
1) username
2) name
3) password
4) gender
5) address
6) email
7) phone_Num
8) picture
9) level_ID
*/
    ?>
    <!--view user-->

    <section class="view_product_section">
    <!-- For debugging purpose -->
    <?php //print_r($arrayOfArrays)?>
        <div class="profile py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div style="height: 70px"></div>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class='profile_img' <?php echo"src='../userPictures/".$arrayOfArrays[0][8]."'"?>>
                                <h5 class="title_text"><?php echo $arrayOfArrays[0][1] ?></h5>
                                <h7><?php echo $arrayOfArrays[0][2] ?></h7>
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
                                    <td width="50%"><?php
                                            if ($arrayOfArrays[0][4] == 1){
                                                echo "Male";
                                            } else{
                                                echo "Female";
                                            }
                                            ?></td>
                                </tr>

                                <tr>
                                    <th width="30%">Address :</th>
                                    <td width="50%"><?php echo $arrayOfArrays[0][5] ?></td>
                                </tr>

                                <tr>
                                    <th width="30%">Phone No. :</th>
                                    <td width="50%"><?php echo $arrayOfArrays[0][7] ?></td>
                                </tr>

                                <tr>
                                    <th width="30%">Email :</th>
                                    <td width="50%"><?php echo $arrayOfArrays[0][6] ?></td>
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
    <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>