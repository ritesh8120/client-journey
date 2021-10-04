<?php
include('config.php');
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $abouttitle = $_POST['abouttitle'];
    $contenttext = $_POST['contenttext'];
    $contentLink = $_POST['contentLink'];
    $comment = $_POST['comment'];
    $fld_date = $_POST['fld_date'];
    $target_dir = "fileupload/";
    $Contentvideo = $target_dir . basename($_FILES["Contentvideo"]["name"]);
    move_uploaded_file($_FILES["Contentvideo"]["tmp_name"], $Contentvideo);
    $Contentimage = $target_dir . basename($_FILES["Contentimage"]["name"]);
    move_uploaded_file($_FILES["Contentimage"]["tmp_name"], $Contentimage);


    $sql = $conn->query("INSERT INTO `post_next_action`(`abouttitle`, `contenttext`, `contentLink`, `Contentvideo`, `Contentimage`, `comment`, `user_id`, `fld_date`, `status`) VALUES ('$abouttitle', '$contenttext', '$contentLink', '$Contentvideo', '$Contentimage', '$comment', '$user_id', '$fld_date', '1')");
    if ($conn->query($sql) === TRUE) {
        echo "success";
    }
}
if (isset($_POST['delete'])) 
{
    $clients_id = $_POST['clients_id'];
    $sql = $conn->query("DELETE FROM `post_next_action` WHERE `user_id`='$clients_id'");
    if ($conn->query($sql) === TRUE) {
        echo "success";
    }
}