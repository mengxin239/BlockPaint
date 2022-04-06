<?php
include "config.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("config.php设置有问题，请仔细检查");
}
$sql = "CREATE TABLE Blocks (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,stat BOOL NOT NULL);";
for($i;$i<400;$i++){
	$sql .= "INSERT INTO Blocks (stat) VALUES (1);";
}
if ($conn->multi_query($sql) === TRUE) {
    echo "已设置成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>