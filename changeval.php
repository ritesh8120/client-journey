<?php

$val = $_POST['val'];
$id = $_POST['id'];
echo $val;
include('config.php');
$sql = "UPDATE `clientpogistion` SET `form_no`= '$val' WHERE `id`='$id' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>