<?php
include('config.php');
if (isset($_POST['notes_id'])) {

$notes_id = $_POST['notes_id'];
$conn->query("DELETE FROM `post_history` WHERE `fld_id`='$notes_id' ");

}
?>