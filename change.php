<?php
include "config.php";
$date = explode(" ",microtime());
if (preg_match("/[^0-9]+/", $_GET['ID'])!=0 && !isset($_GET['id'])) {

	echo sprintf("%.2f",$date[0]+$date[1]);
} else {
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    	die("连接失败: " . $conn->connect_error);
	} 
	$sql = "SELECT stat FROM Blocks where id=".$_GET['ID'];
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	$stat=$row['stat'];
    	}
	} else {
    	exit();
	}
	$stat=(bool)$stat;
	$stat=!$stat;
	$conn->close();
	$con=mysqli_connect($servername, $username, $password, $dbname);
	mysqli_query($con,"UPDATE Blocks SET stat=".(int)$stat." WHERE id=".$_GET['ID']);
	mysqli_close($con);
	echo (int)$stat."  ".sprintf("%.2f",$date[0]+$date[1]);
}
?>