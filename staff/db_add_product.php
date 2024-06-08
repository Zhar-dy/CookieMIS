<?php 
include('../reusableCodes/connectdb.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}
$path = '../images/cookies/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];
if (!empty($_FILES["file"]["name"])) {
	if (!move_uploaded_file($tmplocation, $path . $pic)) {
		die("Error uploading file.");
	}
}

$addrecord = "INSERT INTO product (product_Name, product_Highlight, product_Description, product_Stock, product_Status, product_Price, picture) 
			  VALUES('$valuearr[0]', '$valuearr[1]', '$valuearr[2]', '$valuearr[4]', '$valuearr[5]', '$valuearr[3]', '$pic')";
//echo $addrecord;
	  $result = mysqli_query($conn, $addrecord) or die ("Error: " . mysqli_error($conn));

if ($result) {
	echo "INSERT INTO product (product_Name, product_Highlight, product_Description, product_Stock, product_Status, product_Price, picture)<br> This is one:";
	echo $valuearr[0]."<br>This is 2:";
	echo $valuearr[1]."<br>";
	echo $valuearr[2]."<br>";
	echo $valuearr[4]."<br>";
	echo $valuearr[5]."<br>";
	echo $valuearr[3]."<br>";
	echo $pic;
?>
<script type="text/javascript">
	alert("Successfully added product!")
	window.location = "index.php" //put link to view product webpage later
</script>

<?php } ?>
