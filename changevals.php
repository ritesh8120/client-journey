<?php



$checkboxname = $_POST['checkboxname'];

$id = $_POST['id'];

echo $checkboxname;

include('config.php');

$sql = "UPDATE `clientpogistion` SET `checkboxname`= '$checkboxname' WHERE `id`='$id' ";



if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}



$conn->close();

?>