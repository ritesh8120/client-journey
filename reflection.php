<?php
include('config.php');
    $fld_date = $_POST['fld_date'];
    $text = $_POST['data'];
    $tableId = $_POST['tableId'];
    $year = $_POST['year'];
$fld_day = $_POST['day'];
    
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_tableId`='$tableId' AND `fld_year`='$year' AND `fld_date`='$fld_date'");
    if (mysqli_num_rows($querys) > 0) {
        $querys = mysqli_query($conn, "UPDATE `worksheet` SET `fld_text`='$text' WHERE `fld_tableId`='$tableId' AND `fld_year`='$year' 
        AND `fld_date`='$fld_date'");
    } else {
        $querys = mysqli_query($conn, "INSERT INTO `worksheet`(`fld_text`, `fld_tableId`, `fld_year`,`fld_date`,`fld_type`,`fld_day`,`fld_current_date`) VALUES ('$text','$tableId','$year','$fld_date','','$fld_day','')");
    }
?>