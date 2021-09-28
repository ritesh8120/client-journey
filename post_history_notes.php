<?php
include('config.php');
if (isset($_POST['cid'])) {
    $clientID = $_POST['cid'];
    $title = $_POST['title2'];
    $details = $_POST['historyNotes'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d');
    $target_dir = "fileupload/";
    $postcontent = $target_dir . basename($_FILES["postcontent"]["name"]);
    move_uploaded_file($_FILES["postcontent"]["tmp_name"], $postcontent);

    $sql = "INSERT INTO `post_history`(`title`, `historyNotes`, `postcontent`, `comment`, `fld_date`, `user_id`) VALUES ('$title','$details','$postcontent','$comment','$date','$clientID')";

    if ($conn->query($sql) === TRUE) {

        $historyMember = $conn->query("SELECT * FROM `post_history` WHERE `user_id`='$clientID'");

        if ($historyMember->num_rows > 0) {
            $listView = "";

            $i = 1;

            while ($history = $historyMember->fetch_assoc()) { 

                echo "<tr>

                    <td width='100'>" . $i . "</td>

                    <td width='200'>" . date("m/d/Y", strtotime($history['fld_date'])) . "</td>

                    <td width='500'>" . nl2br($history['title']) . "</td>
                    <td width='500'>" . nl2br($history['historyNotes']) . "</td>
                    <td width='500'>" . nl2br($history['postcontent']) . "</td>
                    <td width='500'>" . nl2br($history['comment']) . "</td>

                    <td width='100'><button onclick='getnotes(" . $history[' fld_id'] . ")' class='btn btn-success editbtn'>Edit</button></td>

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