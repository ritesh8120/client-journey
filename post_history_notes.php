<?php
include('config.php');
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $abouttitle = $_POST['abouttitle'];
    $contenttext = $_POST['contenttext'];
    $contentLink = $_POST['contentLink'];
    $comment = $_POST['comment'];
    $fld_date = date('Y-m-d');
    $target_dir = "fileupload/";
    $Contentvideo = $target_dir . basename($_FILES["Contentvideo"]["name"]);
    move_uploaded_file($_FILES["Contentvideo"]["tmp_name"], $Contentvideo);
    $Contentimage = $target_dir . basename($_FILES["Contentimage"]["name"]);
    move_uploaded_file($_FILES["Contentimage"]["tmp_name"], $Contentimage);

    $sql = "INSERT INTO `post_history`(`abouttitle`, `contenttext`, `contentLink`, `comment`, `fld_date`, `user_id`, `Contentvideo`, `Contentimage`) VALUES ('$abouttitle', '$contenttext', '$contentLink', '$comment', '$fld_date', '$user_id', '$Contentvideo', '$Contentimage')";

    if ($conn->query($sql) === TRUE) {

        $historyMember = $conn->query("SELECT * FROM `post_history` WHERE `user_id`='$clientID'");

        if ($historyMember->num_rows > 0) {
            $listView = "";

            $i = 1;

            while ($history = $historyMember->fetch_assoc()) {

                $listView = "<tr>
                    <td width='100'>" . $i . "</td>
                    <td width='200'>" . date("m/d/Y", strtotime($history['fld_date'])) . "</td>
                    <td width='500'>" . nl2br($history['abouttitle']) . "</td>
                    <td width='500'>" . nl2br($history['contenttext']) . "</td>
                    <td width='500'><a href='" . nl2br($history['contentLink']) . "' target='_blank'>" . nl2br($history['contentLink']) . "</a></td>
                    <td width='500'>" . nl2br($history['comment']) . "</td>
                    <td width='500'><img src='".$history['Contentimage']. "' width='100'></td>
                    <td width='500'><video width='120' height='90' controls>
                        <source src='".$history['Contentvideo']."' type='video/mp4'>
                        <source src='".$history['Contentvideo']."' type='video/ogg'>
                        Your browser does not support the video tag.
                        </video>
                    </td>
                    <td width='100'><button onclick='getnotes(" . $history['fld_id'] . ")' class='btn btn-success editbtn'>Edit</button></td>
                    <td width='100'><button onclick='deletenoted(" . $history['fld_id'] . ")' class='btn btn-danger' >Delete</button></td>
                    </tr>";

                $i++;
            }
        }

        $response['data'] = $listView;
    } else {

        $response['status'] = 0;

        $response['message'] = 'Error while adding notes.';

        $response['data'] = "";
    }
}

?>