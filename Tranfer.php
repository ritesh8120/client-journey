<?php
include('config.php');
$apply = $_POST['apply'];

$val = $_POST['val'];

if ($conn->query("UPDATE `client_info` SET `posion`='$apply' WHERE `cid`='$val'")) {
	echo "string";
}
else{
	echo $val;
}
$conn->close();
?>