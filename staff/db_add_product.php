<?php 
include('../reusableCodes/connectdb.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}
$path = '../images/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];

$addrecord = "INSERT INTO product (product_Name, product_Description, product_Stock, product_Status, product_Price, picture) 
			  VALUES('$valuearr[0]', '$valuearr[1]', '$valuearr[2]', '$valuearr[3]', '$valuearr[4]', '$pic')";
//echo $addrecord;
	  $result = mysqli_query($conn, $addrecord) or die ("Error: " . mysqli_error($conn));

if ($result) {
?>
<script type="text/javascript">
	window.location = "index.php" //put link to view product webpage later
</script>
?>
<?php } ?>
