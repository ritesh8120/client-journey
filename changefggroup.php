<?php
include('config.php');
if (isset($_POST['fggroup'])) {
    $id = $_POST['id'];
    $fggroup = $_POST['fggroup'];
    $qua = "UPDATE  client_info SET `fggroup`='$fggroup' WHERE `cid`='$id'";
    $querys = mysqli_query($conn, $qua);
}
if (isset($_POST['description'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $qua = "UPDATE  client_info SET `description`='$description' WHERE `cid`='$id'";
    $querys = mysqli_query($conn, $qua);
}

?>