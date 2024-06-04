<?php 
include('../reusableCodes/connectdb.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}
$path = '\xampp\htdocs\CookieMIS\images/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];

$addrecord = "INSERT INTO product (product_name, product_description, product_status, product_stock, product_price, picture) 
			  VALUES('$valuearr[0]', '$valuearr[1]', '$valuearr[2]', '$valuearr[3]', '$valuearr[4]', '$pic')";
//echo $addrecord;
	  $result = mysqli_query($conn, $addrecord) or die ("Error: " . mysqli_error($conn));

if ($result) {
?>
<script type="text/javascript">
	window.location = "update_product.php"
</script>
?>
<?php } ?>