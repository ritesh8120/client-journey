<?php
include('config.php');
if (isset($_POST['fggroup'])) {
    $id = $_POST['id'];
    $fggroup = $_POST['fggroup'];
    $qua = "UPDATE  client_info SET  WHERE `cid`='$id'";
    $querys = mysqli_query($conn, $qua);
}
if (isset($_POST['description'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $qua = "UPDATE  client_info SET  WHERE `cid`='$id'";
    $querys = mysqli_query($conn, $qua);
}
if (isset($_POST['audience'])) {
    $audience = $_POST['audience'];
    $cid = $_POST['cid'];

    $conn->query("update client_info SET `Audience`=$audience where `cid`='$cid'");
}

?>