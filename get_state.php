<?php
include "config.php";
ob_implicit_flush(true);
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
for($temp=0;$temp<100;$temp++){
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("config.php设置有问题，请仔细检查");
} 
$sql = "SELECT stat FROM Blocks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  	while($row = $result->fetch_assoc()) {
        echo "
"."data: ".$row['stat'];
    }
}
$conn->close();
$date = explode(" ",microtime());
echo "
"."data: #".sprintf("%.2f",$date[0]+$date[1])."
";
sleep(0.5);
}
?>
