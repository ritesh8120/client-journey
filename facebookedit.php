<?php
include('config.php');
$addnew = $_POST['addnew'];
$fbgname = $_POST['fbgname'];
$fbglink = $_POST['fbglink'];
$adminname = $_POST['adminname'];
$adminplink = $_POST['adminplink'];
$currentm = $_POST['currentm'];
$date = date('Y-m-d');
$fld_id = $_POST['fld_id'];
$query = $conn->query("UPDATE `facebookgroup` SET `addnew`='$addnew',`fbgname`='$fbgname',`fbglink`='$fbglink',`adminname`='$adminname',`adminplink`='$adminplink',`currentm`='$currentm',`date`='$date' WHERE `fld_id`='$fld_id'");
if ($query === TRUE) {
    echo "success";
}