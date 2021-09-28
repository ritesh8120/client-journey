<?php
include('config.php');

if(isset($_REQUEST["delid"]))
{
  $delid = $_REQUEST["delid"];
  $userid= $_REQUEST['clientid'];

  mysqli_query($conn,"DELETE FROM `business` WHERE client_id='$delid'");
  mysqli_query($conn,"DELETE FROM `personal` WHERE client_id='$delid'");
  $del = "DELETE FROM `clientpogistion` WHERE id='$delid'";
    if (mysqli_query($conn,$del) === TRUE ) {
   	 header("location: edit?upid=".$userid);
   } 
}