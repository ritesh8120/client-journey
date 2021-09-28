<?php
include('config.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $audience = $_POST['audience'];
    $qua = "UPDATE  client_info SET `Audience`='$audience',`level`='1' WHERE `cid`='$id'";
    $querys = mysqli_query($conn, $qua);
}

if (isset($_POST['text'])) 
{
    $text = $_POST['text'];
    $tableId = $_POST['tableId'];
    $year = $_POST['year'];
    $querys = mysqli_query($conn, "SELECT * FROM `kpi` WHERE `fld_tableId`='$tableId' AND `fld_year`='$year'");
    if (mysqli_num_rows($querys) > 0) 
    {
        $querys = mysqli_query($conn, "UPDATE `kpi` SET `fld_text`='$text' WHERE `fld_tableId`='$tableId' AND `fld_year`='$year'");
    }else {
        $querys = mysqli_query($conn, "INSERT INTO `kpi`(`fld_text`, `fld_tableId`, `fld_year`) VALUES ('$text','$tableId','$year')");
    }
}

if (isset($_POST['data'])) {
    $text = $_POST['data'];
    $tableId = $_POST['tableId'];
    $year = $_POST['year'];
    $fld_type = $_POST['type'];
    $fld_date = $_POST['fld_date'];
    $fld_day = $_POST['day'];
    $cdate = $_POST['cdate'];
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_tableId`='$tableId' AND `fld_year`='$year' AND `fld_date`='$fld_date'");
    if (mysqli_num_rows($querys) > 0) {
        $querys = mysqli_query($conn, "UPDATE `worksheet` SET `fld_text`='$text' WHERE `fld_tableId`='$tableId' AND `fld_year`='$year' 
        AND `fld_date`='$fld_date'");
    } else {
        $querys = mysqli_query($conn, "INSERT INTO `worksheet`(`fld_text`, `fld_tableId`, `fld_year`,`fld_date`,`fld_type`,`fld_day`,`fld_current_date`) VALUES ('$text','$tableId','$year','$fld_date','$fld_type','$fld_day','$cdate')");
    }
}

if (isset($_POST['prospect'])) {
    $goal = $_POST['goal'];
    $client = $_POST['client'];
    $year = $_POST['year'];
    $querys = mysqli_query($conn, "SELECT * FROM `projection` WHERE `fld_year`='$year'");
    if (mysqli_num_rows($querys) > 0) {
        $querys = mysqli_query($conn, "UPDATE `projection` SET `goal`='$goal', `client`='$client' WHERE `fld_year`='$year'");
    } else {
        $querys = mysqli_query($conn, "INSERT INTO `projection`(`goal`, `client`, `fld_year`) VALUES ('$goal', '$client', '$year')");
    }
}
?>