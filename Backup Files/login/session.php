
<?php
//session_start();
// set timeout period in seconds
$inactive = 600;
// check to see if $_SESSION["timeout"] is set
if(isset($_SESSION["timeout"]) ) {
	$session_life = time() - $_SESSION["timeout"];
	if($session_life > $inactive)
        { header("Location: ../login/logout.php"); }
}
$_SESSION["timeout"] = time();

?>

