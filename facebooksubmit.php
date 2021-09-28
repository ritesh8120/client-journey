<?php
include('config.php');
$addnew = $_POST['addnew'];
$fbgname = $_POST['fbgname'];
$fbglink = $_POST['fbglink'];
$adminname = $_POST['adminname'];
$adminplink = $_POST['adminplink'];
$currentm = $_POST['currentm'];
$date = date('Y-m-d');
$query = $conn->query("INSERT INTO `facebookgroup`(`addnew`, `fbgname`, `fbglink`, `adminname`, `adminplink`, `currentm`,`date`) VALUES ('$addnew', '$fbgname', '$fbglink', '$adminname', '$adminplink', '$currentm','$date')");
if ($query === TRUE) {
    echo "success";
}
 ?>