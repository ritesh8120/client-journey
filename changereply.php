<?php
include('config.php');
$id = $_POST['id'];
$audience = $_POST['audience'];
$qua = "UPDATE  client_info SET `reply`='$audience' WHERE `cid`='$id'";
$querys = mysqli_query($conn,$qua);
?>